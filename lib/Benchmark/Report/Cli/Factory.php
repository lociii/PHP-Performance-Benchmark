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
 * @see Benchmark_Report_Cli_Name
 */
require_once 'Benchmark/Report/Cli/Name.php';
/**
 * @see Benchmark_Report_Cli_Description
 */
require_once 'Benchmark/Report/Cli/Description.php';
/**
 * @see Benchmark_Report_Cli_Source
 */
require_once 'Benchmark/Report/Cli/Source.php';
/**
 * @see Benchmark_Report_Cli_Result
 */
require_once 'Benchmark/Report/Cli/Result.php';

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
class Benchmark_Report_Cli_Factory implements Benchmark_Report_IFactory {
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 * @param int                 $id
	 *
	 * @return Benchmark_Report_Cli_Name
	 */
	public static function createName(Benchmark_Abstract $benchmark, $id = null) {
		$name = new Benchmark_Report_Cli_Name($benchmark);
		$name->setId($id);

		return $name;
	}

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return Benchmark_Report_Cli_Description
	 */
	public static function createDescription(Benchmark_Abstract $benchmark) {
		return new Benchmark_Report_Cli_Description($benchmark);
	}

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return Benchmark_Report_Cli_Source
	 */
	public static function createSource(Benchmark_Abstract $benchmark)  {
		return new Benchmark_Report_Cli_Source($benchmark);
	}

	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return Benchmark_Report_Cli_Result
	 */
	public static function createResult(Benchmark_Abstract $benchmark) {
		return new Benchmark_Report_Cli_Result($benchmark);
	}
}