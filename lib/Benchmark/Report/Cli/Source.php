<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 * @see Benchmark_Report_IItem
 */
require_once 'Benchmark/Report/IItem.php';

/**
 *
 *
 * @category   Benchmark
 * @package    Report
 * @subpackage Cli
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Benchmark_Report_Cli_Source implements Benchmark_Report_IItem {
	/**
	 *
	 * @var Benchmark_Abstract
	 */
	private $benchmark;

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 */
	public function __construct(Benchmark_Abstract $benchmark) {
		$this->benchmark = $benchmark;
	}

	/**
	 *
	 * @return string
	 */
	public function  __toString() {
		$string = $this->benchmark->getFile() . PHP_EOL;
		$tests  = $this->benchmark->getTests();

		if (!empty ($tests)) {
			foreach ($tests as $testName => $methodName) {
				$string .= $this->formatSource($testName, $methodName);
			}
		}

		return $string;
	}

	/**
	 * Formates source code.
	 *
	 * @param	string function name
	 * @param	string test name
	 *
	 * @return string
	 */
	private function formatSource($testName, $methodName) {
		$cliString = $testName . ':' . PHP_EOL;

		$source = $this->benchmark->getSource($methodName);
		$sourceString = '<?php' . PHP_EOL;

		if (isset ($source['prepare'])) {
			$sourceString .= "\t\t" . trim($source['prepare']) . PHP_EOL;
		}

		$sourceString .= "\t\t".trim($source['test']) . PHP_EOL;

		if (isset ($source['close'])) {
			$sourceString .= "\t\t".trim($source['close']) . PHP_EOL;
		}

		$cliString .= preg_replace('/^\t\t/m', "\t", $sourceString) . '?>' . PHP_EOL;

		return $cliString . PHP_EOL;
	}
}