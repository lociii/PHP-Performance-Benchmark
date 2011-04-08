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
class Benchmark_Report_Cli_Result implements Benchmark_Report_IItem {
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
			return 'Tests are incomplete!' . PHP_EOL;
		} else if ($this->benchmark->isSkipped()) {
			return 'Tests are skipped!' . PHP_EOL;
		} else if (empty ($results)) {
			return 'Doesn not have results for benchmark!' . PHP_EOL;
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
		$string  = $this->generateResultHead();
		$string .= $this->generateResultRow($results, $results[key($results)]);

		return $string;
	}

	/**
	 *
	 * @return string
	 */
	public function generateResultHead() {
		$string  = "Gesamtlaufzeit\t";
		$string .= "Durchschnitt\t";
		$string .= "Performance\t";
		$string .= "Test" . PHP_EOL;
		$string .= str_repeat('-', 80) . PHP_EOL;

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
			$string .= number_format($value, 5, ',', '.') . "s\t";

			$perLoop = $value * 1000000 / $this->benchmark->getLoopCount();
			$string .= number_format($perLoop, 5, ',', '.') . "ns\t";

			$percent = $value / $reference * 100;
			$string .= number_format($percent, 2, ',', '.') . "%\t\t";

			if ($value == $reference) {
				$string .=  "winner: ";
			} else if ($value / $reference * 100 < 100 + Benchmark_Abstract::GOOD_LIMIT) {
				$string .=  "good: ";
			}

			$string .=  $name . PHP_EOL;
		}

		return $string;
	}
}