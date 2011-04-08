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
class Benchmark_Report_Html_Result implements Benchmark_Report_IItem {
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
		$results = $this->benchmark->getResults();

		if ($this->benchmark->isIncomplete()) {
			return '<p>Tests are incomplete!</p>' . PHP_EOL;
		} else if ($this->benchmark->isSkipped()) {
			return '<p>Tests are skipped!</p>' . PHP_EOL;
		} else if (empty ($results)) {
			return '<p>Does not have results for benchmark!</p>' . PHP_EOL;
		}

		return $this->generateResultTable($results);
	}

	/**
	 *
	 * @param array $results
	 *
	 * @return string
	 */
	public function generateResultTable(array $results) {
		$string  = '<table class="result">' . PHP_EOL;
		$string .= $this->generateResultHead();
		$string .= $this->generateResultRow($results, $results[key($results)]);
		$string .=  '</table>' . PHP_EOL;

		return $string;
	}

	/**
	 *
	 * @return string
	 */
	public function generateResultHead() {
		$string  = '<tr>' . PHP_EOL;
		$string .= '<th>Test</th>' . PHP_EOL;
		$string .= '<th>Gesamtlaufzeit</th>' . PHP_EOL;
		$string .= '<th>Durchschnitt je Aufruf</th>' . PHP_EOL;
		$string .= '<th>Performance</th>' . PHP_EOL;
		$string .= '</tr>' . PHP_EOL;

		return $string;
	}

	/**
	 *
	 * @param array $results
	 * @param int   $reference
	 *
	 * @return string
	 */
	public function generateResultRow(array $results, $reference) {
		$string = '';

		foreach ($results as $name => $value) {
			if ($value == $reference) {
				$string .=  '<tr class="winner">' . PHP_EOL;
			} else if ($value / $reference * 100 < 100 + Benchmark_Abstract::GOOD_LIMIT) {
				$string .=  '<tr class="good">' . PHP_EOL;
			} else {
				$string .=  '<tr>' . PHP_EOL;
			}

			$string .=  '<td>' . $name.'</td>' . PHP_EOL;
			$string .=  '<td>';
			$string .= number_format($value, 5, ',', '.');
			$string .= 's</td>' . PHP_EOL;
			$string .=  '<td>';

			$perLoop = $value * 1000000 / $this->benchmark->getLoopCount();
			$string .= number_format($perLoop, 5, ',', '.');
			$string .= 'ns</td>' . PHP_EOL;
			$string .=  '<td>';

			$percent = $value / $reference * 100;
			$string .= number_format($percent, 2, ',', '.');
			$string .= '%</td>' . PHP_EOL;
			$string .=  '</tr>';
		}

		return $string;
	}
}