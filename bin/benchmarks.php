<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/*
 * Neccessary for the signal handler
 */
declare(ticks = 1);

/**
 *
 * @category   Benchmark
 * @package    bin
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Benchmrks {
	const MODE_RUN_TESTS = '--run-tests';
	const MODE_INFO = '--info';
	const MODE_LIST = '--list';

	/**
	 *
	 * @var string
	 */
	private $mode;
	/**
	 *
	 * @var string
	 */
	private $executable;
	/**
	 *
	 * @var string
	 */
	private $homeDirectory;
	/**
	 *
	 * @var string
	 */
	private $benchMarkDir;
	/**
	 *
	 * @var array
	 */
	private $benchmarks;
	/**
	 *
	 * @var array
	 */
	private $reports;
	/**
	 *
	 * @var int
	 */
	private $loopCount;
	/**
	 *
	 * @var array
	 */
	private $runTests = array();

	/**
	 * Main execution method.
	 *
	 * @return int
	 */
	public static function main() {
		try {
			$performancetests = new self();
			$performancetests->bootstrap();
			$performancetests->run();
		} catch (Exception $e) {
			echo $e->getMessage() . PHP_EOL;
			return 1;
		}

		return 0;
	}

	/**
	 * Setting up everything we need for execution.
	 */
	public function bootstrap() {
		$this->mode          = $this->detectMode();
		$this->homeDirectory = dirname(dirname(__FILE__));
		$this->benchMarkDir  = $this->homeDirectory . DIRECTORY_SEPARATOR . 'benchmarks';

		$this->setupPhpRuntime();
		$this->registerSignalHandlers();
	}

	/**
	 * Return the run mode.
	 *
	 * @return string
	 */
	protected function detectMode() {
		$arguments = $_SERVER['argv'];
		$mode = self::MODE_INFO;

		if (!isset($arguments[0])) {
			return $mode;
		}

		if ($arguments[0] === $_SERVER['PHP_SELF']) {
			$this->executable = array_shift($arguments);
		}

		if (!isset($arguments[0])) {
			return $mode;
		}

		if ($arguments[0] === self::MODE_RUN_TESTS) {
			$mode = array_shift($arguments);

			if (count($arguments) > 0) {
				foreach ($arguments as $testName) {
					$this->runTests[] = $testName;
				}
			}
		} elseif ($arguments[0] === self::MODE_INFO) {
			$mode = self::MODE_INFO;
		} elseif ($arguments[0] === self::MODE_LIST) {
			$mode = self::MODE_LIST;
		}

		return $mode;
	}

	protected function setupPhpRuntime() {
		ini_set('display_errors', true);
		// temporary disable eaccelerator
		ini_set('eaccelerator.enable', '0');
		ini_set('eaccelerator.optimizer', '0');
		set_include_path(implode(PATH_SEPARATOR, array(
													  $this->homeDirectory . DIRECTORY_SEPARATOR . 'lib',
													  get_include_path()
												 )));
	}

	protected function registerSignalHandlers() {
		if (!function_exists('pcntl_signal')) {
			$message  = 'The function pcntl_signal() is not available! ';
			$message .= 'Its neccessary to compile PHP with the option --enable-pcntl.';
			throw new RuntimeException($message);
		}

		if (!pcntl_signal(SIGINT, array(&$this, 'signal'))) {
			$message = 'Cant register signal handler for SIGINT!';
			throw new RuntimeException($message);
		}
	}

	public function signal($signal) {
		if (self::MODE_RUN_TESTS == $this->mode) {
			$this->printReports();
		}

		if (SIGINT === $signal) {
			throw new Exception('Tests borted by ctrl+c!');
		}
	}

	/**
	 *
	 */
	public function run() {
		switch ($this->mode) {
			case self::MODE_LIST:
				$this->listBenchmarks();
				break;

			case self::MODE_RUN_TESTS:
				$this->runTests();
				break;

			case self::MODE_INFO:
			default:
				$this->runInfo();
				break;
		}
	}

	protected function echoMsg($msg = '') {
		echo $msg . PHP_EOL;
	}

	protected function runInfo() {
		$extension = (PHP_OS === 'WINNT') ? '.bat' : '.sh';
		$execuatble  = str_replace('.php', $extension, $this->executable);
		$string = $execuatble;
		$string .= ' [' . self::MODE_INFO . ']';
		$string .= ' [' . self::MODE_LIST . ']';
		$string .= ' [' . self::MODE_RUN_TESTS . ' [...]]';
		$this->echoMsg($string);
		$this->echoMsg();
		$this->echoMsg("\t" . self::MODE_RUN_TESTS . "\tRuns all benchmarks.");
		$this->echoMsg();
		$this->echoMsg("\t\t\tExample:");
		$this->echoMsg("\t\t\t" . $execuatble . ' ' . self::MODE_RUN_TESTS .
					   ' BenchmarkName1 BenchmarkName2 ...');
		$this->echoMsg();
		$this->echoMsg("\t\t\tRuns the named Benchmarks.");
		$this->echoMsg();

		$this->echoMsg("\t" . self::MODE_LIST . "\t\tLists all benchmarks.");
		$this->echoMsg();

		$this->echoMsg("\t" . self::MODE_INFO . "\t\tThis help page.");
		$this->echoMsg();
	}

	public function getBenchMarks() {
		if (null === $this->benchmarks) {
			$this->benchmarks = $this->detectBenchMarks();
		}

		return $this->benchmarks;
	}
	protected function listBenchmarks() {
		$benchmarks = $this->getBenchMarks();
		$this->echoMsg('Found ' . count($benchmarks) . ' tests in ' . $this->benchMarkDir);

		foreach (array_keys($benchmarks) as $benchmarkName) {
			$this->echoMsg(' - ' . $benchmarkName);
		}
	}

	protected function runTests() {
		require_once 'Benchmark/Report/Cli.php';
		$benchmarks = $this->getBenchMarks();
		set_time_limit(0);
		$this->reports = array();
		$counter = 0;
		$checkTestShouldRun = count($this->runTests) > 0;

		foreach ($benchmarks as $benchmarkName => $file) {
			if ($checkTestShouldRun && !in_array($benchmarkName, $this->runTests)) {
				continue;
			}

			require_once $file;
			/* @var $benchmark Benchmark_Abstract */
			$benchmark = new $benchmarkName();

			if (null !== $this->loopCount) {
				$benchmark->setLoopCount($this->loopCount);
			}

			$benchmark->execute();
			$this->printStatus($benchmark);
			$this->reports[] = new Benchmark_Report_Cli($benchmark, $counter + 1);
			$counter++;
		}

		$this->echoMsg(' (' . $counter . ')');
		$this->printReports();
	}

	protected function detectBenchMarks() {
		/* @var $dirContent array */
		$dirContent = scandir($this->benchMarkDir);
		$benchmarks = array();

		foreach ($dirContent as $file) {
			if (!is_dir($file) && substr($file, 0, 1) !== '_') {
				$benchmarkName = str_replace('.php', '', $file);
				/* @var $file string */
				$benchmarks[$benchmarkName] = $this->benchMarkDir . DIRECTORY_SEPARATOR . $file;
			}
		}

		return $benchmarks;
	}

	private function printStatus(Benchmark_Abstract $benchmark) {
		if ($benchmark->isSkipped()) {
			echo 'S';
		} else if ($benchmark->isIncomplete()) {
			echo 'I';
		} else {
			echo '.';
		}
	}

	private function printReports() {
		echo PHP_EOL;

		if (empty ($this->reports)) {
			echo 'No tests executed!' . PHP_EOL;
			return;
		}

		foreach ($this->reports as $id => $report) {
			echo $report;
		}
	}
}

exit(Benchmrks::main());