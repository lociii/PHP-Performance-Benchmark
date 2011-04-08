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
 * @see Benchmark_Report_Html_Factory
 */
require_once 'Benchmark/Report/Html/Factory.php';

/**
 *
 *
 * @category   Benchmark
 * @package    Report
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Benchmark_Report_Html extends Benchmark_Report_Abstract {
	public function createComposition() {
		return array(
			Benchmark_Report_Html_Factory::createName($this->benchmark),
			Benchmark_Report_Html_Factory::createDescription($this->benchmark),
			Benchmark_Report_Html_Factory::createSource($this->benchmark),
			Benchmark_Report_Html_Factory::createResult($this->benchmark)
		);
	}
}