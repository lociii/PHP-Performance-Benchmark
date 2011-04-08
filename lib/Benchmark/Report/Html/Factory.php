<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 * @see Benchmark_Report_IFactory
 */
require_once 'Benchmark/Report/IFactory.php';
/**
 * @see Benchmark_Report_Html_Name
 */
require_once 'Benchmark/Report/Html/Name.php';
/**
 * @see Benchmark_Report_Html_Description
 */
require_once 'Benchmark/Report/Html/Description.php';
/**
 * @see Benchmark_Report_Html_Source
 */
require_once 'Benchmark/Report/Html/Source.php';
/**
 * @see Benchmark_Report_Html_Result
 */
require_once 'Benchmark/Report/Html/Result.php';

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
class Benchmark_Report_Html_Factory implements Benchmark_Report_IFactory {
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 * @param int                $id
	 *
	 * @return Benchmark_Report_Html_Name
	 */
	public static function createName(Benchmark_Abstract $benchmark, $id = null) {
		$name = new Benchmark_Report_Html_Name($benchmark);
		$name->setId($id);

		return $name;
	}

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return Benchmark_Report_Html_Description
	 */
	public static function createDescription(Benchmark_Abstract $benchmark) {
		return new Benchmark_Report_Html_Description($benchmark);
	}

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return Benchmark_Report_Html_Source
	 */
	public static function createSource(Benchmark_Abstract $benchmark)  {
		return new Benchmark_Report_Html_Source($benchmark);
	}

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return Benchmark_Report_Html_Result
	 */
	public static function createResult(Benchmark_Abstract $benchmark) {
		return new Benchmark_Report_Html_Result($benchmark);
	}
}