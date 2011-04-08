<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 *
 *
 * @category   Benchmark
 * @package    Report
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
interface Benchmark_Report_IFactory {
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 * @param int                $id
	 *
	 * @return Benchmark_Report_IItem
	 */
	public static function createName(Benchmark_Abstract $benchmark, $id = null);
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return @return Benchmark_Report_IItem
	 */
	public static function createDescription(Benchmark_Abstract $benchmark);
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return @return Benchmark_Report_IItem
	 */
	public static function createSource(Benchmark_Abstract $benchmark);
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 *
	 * @return @return Benchmark_Report_IItem
	 */
	public static function createResult(Benchmark_Abstract $benchmark);
}