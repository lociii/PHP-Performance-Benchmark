<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 * @see Benchmark_ICommand
 */
require_once 'Benchmark/ICommand.php';

/**
 *
 * @category   Benchmark
 * @package    Benchmark
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
abstract class Benchmark_Abstract implements Benchmark_ICommand {
	/**
	 * slowdown factor
	 */
	const GOOD_LIMIT = 5;

	/**
	 * Filename.
	 *
	 * Initialize this member in your concrete benchmarks constructor
	 * with __FILE__.
	 *
	 * @var string
	 */
	protected $file;
	/**
	 * The php file content.
	 *
	 * @var string
	 */
	private $fileContent;
	/**
	 * Count how many loops the test methods will run.
	 *
	 * @var int
	 */
	protected $loopCount = 100000;
	/**
	 * The benchmarked test methods with a descriptive text.
	 *
	 * The format is as:
	 * <code>
	 * array(
	 *      'descriptive text' => 'test_method_name',
	 *      ...
	 * );
	 * </code>
	 *
	 * An example:
	 * <code>
	 * array(
	 *      'complete string' => 'complete_string',
	 *      'dot like'		  => 'dot_like',
	 *   );
	 * </code>
	 *
	 * @var array
	 */
	protected $benchmarks = array();
	/**
	 * The meassured time of each test method loop run.
	 *
	 * The format is as:
	 * <code>
	 * array(
	 *      'descriptive text' => time in milliseconds,
	 *      ...
	 * );
	 * </code>
	 *
	 * An example:
	 * <code>
	 * array(
	 *      'complete string' => 0.12466382980347,
	 *      'dot like'		  => 0.13803291320801,
	 * );
	 * </code>
	 *
	 * @var array
	 */
	protected $results = array();
	/**
	 * A descriptive name of the benchmark
	 *
	 * @var string
	 */
	protected $name;
	/**
	 * A brief description of the benchmark.
	 *
	 * @var string
	 */
	protected $description;
	/**
	 * The source code of the test methods.
	 *
	 * <pre>
	 * array(2) {
	 * ["complete_string"]=>
	 *   string(62) "
	 *     $var = $this->str;
	 *     $var = $var . 'addstring';"
	 * ["dot_like"]=>
	 * string(56) "
	 *     $var = $this->str;
	 *     $var .= 'addstring';"
	 * }
	 * </pre>
	 *
	 * @var string
	 */
	private $sources;
	/**
	 * Flaf if benchmark are incomplete.
	 *
	 * @var bool
	 */
	private $isIncomplete = false;
	/**
	 * Flag if benchmark are skipped.
	 *
	 * @var bool
	 */
	private $isSkipped = false;

	/**
	 * Marks the whole benchmark incomplete.
	 *
	 * @return void
	 */
	protected function markIncomplete() {
		$this->isIncomplete = true;
	}

	/**
	 * Whether the benchmar is incomplete.
	 *
	 * @return bool
	 */
	public function isIncomplete() {
		return $this->isIncomplete;
	}

	/**
	 * Marks the whole benchmark skipped.
	 *
	 * @return void
	 */
	protected function markSkipped() {
		$this->isSkipped = true;
	}

	/**
	 * Whether the benchmar is skipped.
	 *
	 * @return bool
	 */
	public function isSkipped() {
		return $this->isSkipped;
	}

	/**
	 * Returns the benchmark filename.
	 *
	 * @return string
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * Returns a the descriptive name.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Returns the brief description.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Returns how many times the test methods will be executed.
	 *
	 * @return int
	 */
	public function getLoopCount() {
		return $this->loopCount;
	}

	/**
	 * Sets how many time the toost are looped.
	 *
	 * @param int $count The count of loops.
	 */
	public function setLoopCount($count) {
		$this->loopCount = (int)$count;
	}

	/**
	 * Returns the sources of the the given test method.
	 *
	 * This method lazy loads the source from the file.
	 *
	 * The returned array contains the test source under the key 'test'.
	 * Optionaly, if existing, unter the keys 'prepare' and 'close' the
	 * source of the prepare and close methods is returned.
	 *
	 * @param string $testMethodName
	 *
	 * @return array
	 */
	public function getSource($testMethodName) {
		if (null === $this->sources) {
			foreach ($this->benchmarks as $methodName) {
				$this->loadSource($methodName);
			}
		}

		if (isset ($this->sources[$testMethodName])) {
			return $this->sources[$testMethodName];
		}

		return null;
	}

	/**
	 * Returns the defined tests.
	 *
	 * @return array
	 */
	public function getTests() {
		return $this->benchmarks;
	}

	/**
	 * Returns the measured results.
	 *
	 * @return array
	 */
	public function getResults() {
		return $this->results;
	}

	/**
	 * Prepare and perform the tests.
	 *
	 * @return void
	 */
	public function execute() {
		// loop through tests
		foreach ($this->benchmarks as $testName => $methodName) {
			// prepare data if any
			$this->prepare();
			$this->callPrepares($methodName);
			$this->meassureTest($testName, $methodName);
			$this->callCloses($methodName);
		}

		// sorting by speed
		asort($this->results);
		reset($this->results);
	}

	/**
	 * Check for special preparation methods and calls them.
	 *
	 * If you want to run a special preparation method before a test method
	 * is executed aditional to the prepare() template method define a
	 * special prepare method. The sepcial prepare method names must begin with
	 * 'prepare_'.
	 *
	 * For example you want to call a special prepare method for your test method
	 * 'my_test' you must define a method named 'prepare_my_test'.
	 *
	 * @param string $testMethodName
	 *
	 * @return void
	 */
	private function callPrepares($testMethodName) {
		$prepareMethodName = 'prepare_' . $testMethodName;

		if (method_exists($this, $prepareMethodName)) {
			$this->$prepareMethodName();
		}
	}

	/**
	 * Calls a special closing function for the testmethod.
	 *
	 * @param string $testMethodName
	 *
	 * @return void
	 */
	private function callCloses($testMethodName) {
		$closeMethodName = 'close_'.$testMethodName;

		if (method_exists($this, $closeMethodName)) {
			$this->$closeMethodName();
		}
	}

	/**
	 * MEassures the test method.
	 *
	 * @param string $testName
	 * @param string $testMethodName
	 *
	 * @return void
	 */
	private function meassureTest($testName, $testMethodName) {
		$begin = microtime(true);

		for ($i = 0; $i < $this->loopCount; ++$i) {
			$this->$testMethodName();
		}

		$this->results[$testName] = microtime(true) - $begin;
	}

	/**
	 * Loads the sources of the given testmethod.
	 *
	 * It also loads the optional special prepare and closing methods.
	 *
	 * @param string $testMethodName
	 *
	 * @return void
	 */
	private function loadSource($testMethodName) {
		$source  = $this->parseSource($testMethodName);

		if (null !== $source) {
			$this->sources[$testMethodName] = array('test' => $source);
			$prepareMethodName = 'prepare_' . $testMethodName;

			if (method_exists($this, $prepareMethodName)) {
				$this->sources[$testMethodName]['prepare'] = $this->parseSource($prepareMethodName);
			}

			$closeMEthodName = 'close_' . $testMethodName;

			if (method_exists($this, $closeMEthodName)) {
				$this->sources[$testMethodName]['close'] = $this->parseSource($closeMEthodName);
			}
		}
	}

	/**
	 * Parses the method bodiey from the given method out of the benchmark file.
	 *
	 * The file content is lazy loaded one time only.
	 *
	 * @param string $methodName
	 *
	 * @return string
	 */
	private function parseSource($methodName) {
		if (null === $this->fileContent) {
			$this->fileContent = file_get_contents($this->file);
		}

		$pattern = '/protected\s+function\s+' . $methodName . '\s*\([^\)]*\)\s*\{(.*?)\n\s+\}/msi';
		$matches = array();

		if (preg_match($pattern, $this->fileContent, $matches) && isset ($matches[1])) {
			return $matches[1];
		}

		return null;
	}

	/**
	 * Empty prepare template method.
	 *
	 * Needs to be implemented by child classes.
	 *
	 * @return void
	 */
	protected function prepare() {}
}