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
class ForVsForeach extends Benchmark_Abstract {
	private $array;

	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 1000;
		$this->name = 'for and foreach (array loop)';
		$this->description = 'looping through an array with 1000 elements using for and foreach';
		$this->benchmarks = array(
			'for' 	=> 'test_for',
			'foreach' 	=> 'test_foreach'
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
			$var = $this->array[$j];
		}
	}

	protected function test_foreach() {
		foreach ($this->array as $key => $value) {
			$var = $value;
		}
	}
}