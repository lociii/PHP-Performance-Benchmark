<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 * @see Benchmark_Abstract
 */
require_once 'Benchmark/Abstract.php';

/**
 *
 * @category   Benchmark
 * @package    Test
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class ForVsFor extends Benchmark_Abstract {
	private $array;

	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 10000;
		$this->name = 'for (array loop) with internal and external counts';
		$this->description = 'looping through an array with 1000 elements using two different ways to determine loop count';
		$this->benchmarks = array(
			'for (external)' => 'test_for',
			'for (internal)' => 'test_for_within'
		);
	}

	protected function prepare() {
		$this->array = array();

		for ($i = 0; $i < 1000; ++$i) {
			$this->array[] = rand(1, 1000);
		}
	}

	protected function test_for() {
		$count = count($this->array);

		for ($j = 0; $j < $count; ++$j) {
			$var = $j;
		}
	}

	protected function test_for_within() {
		for ($j = 0, $loopLimit = count($this->array); $j < $loopLimit; ++$j) {
			$var = $j;
		}
	}
}