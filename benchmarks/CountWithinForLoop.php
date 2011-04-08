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
class CountWithinForLoop extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'function call within loop defintion (for)';
		$this->description = 'counting the number of array elements within the loop definition compared to a prepared count outside the definition';
		$this->benchmarks = array(
			'function call within loop' 	=> 'function_within',
			 'function call outside loop' 	=> 'function_outside'
		);
		$this->array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	}

	protected function function_within() {
		for ($j = 0; $j < count($this->array); ++$j) {
			$this->array[$j];
		}
	}

	protected function function_outside() {
		$count = count($this->array);

		for ($j = 0; $j < $count; ++$j) {
			$this->array[$j];
		}
	}
}