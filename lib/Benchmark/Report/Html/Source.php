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
 * @subpackage Html
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Benchmark_Report_Html_Source implements Benchmark_Report_IItem {
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
		$string = '';

		foreach ($this->benchmark->getTests() as $testName => $methodName) {
			$string .= $this->formatSource($testName, $methodName);
		}

		return $string;
	}

	/**
	 * show formatted source code
	 *
	 * @param string Function name
	 * @param string Test name
	 *
	 * @return string
	 */
	private function formatSource($testName, $methodName) {
		$htmlString  = '<div>';
		$htmlString .= $testName.'<br />';

		$source = $this->benchmark->getSource($methodName);
		$sourceString = '<?php' . PHP_EOL;

		if (isset ($source['prepare'])) {
			$sourceString .= "\t\t" . trim($source['prepare']) . PHP_EOL;
		}

		$sourceString .= "\t\t".trim($source['test']) . PHP_EOL;

		if (isset ($source['close'])) {
			$sourceString .= "\t\t" . trim($source['close']) . PHP_EOL;
		}

		$htmlString .= highlight_string(preg_replace('/^\t\t/m', "\t", $sourceString).'?>', true);
		$htmlString .= '</div>';

		return $htmlString;
	}
}