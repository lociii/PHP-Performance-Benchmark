<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 * @see Benchmark_Report_Abstract
 */
require_once 'Benchmark/Report/Abstract.php';
/**
 * @see Benchmark_Report_Cli_Factory
 */
require_once 'Benchmark/Report/Cli/Factory.php';

/**
 *
 *
 * @category   Benchmark
 * @package    Report
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Benchmark_Report_Cli extends Benchmark_Report_Abstract {
	/**
	 *
	 * @var int
	 */
	private $id;


	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 * @param int                 $id
	 */
	public function  __construct(Benchmark_Abstract $benchmark, $id = null) {
		parent::__construct($benchmark);
		$this->id = $id;
	}

	public function createComposition() {
		return array(
			Benchmark_Report_Cli_Factory::createName($this->benchmark, $this->id),
			Benchmark_Report_Cli_Factory::createDescription($this->benchmark),
			Benchmark_Report_Cli_Factory::createSource($this->benchmark),
			Benchmark_Report_Cli_Factory::createResult($this->benchmark)
		);
	}

	/**
	 *
	 * @return string
	 */
	public function __toString() {
		$string  = parent::__toString();
		$string .= str_repeat('*', 80) . PHP_EOL . PHP_EOL;

		return $string;
	}
}