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
class Benchmark_Report_Cli_Description implements Benchmark_Report_IItem {
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
		$string  = $this->benchmark->getDescription();
		$string .= ' (loops: ';
		$string .= number_format($this->benchmark->getLoopCount(), 0, ',', '.');
		$string .= ')' . PHP_EOL . PHP_EOL;

		return wordwrap($string, 80);
	}
}