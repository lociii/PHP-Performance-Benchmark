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
class InArrayIsset extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'checking the existence of an array key with in_array and isset';
		$this->description = 'comparing the existence check speed between a numbered array vs. an array using the values as keys with isset';
		$this->benchmarks = array(
			'in_array' 	=> 'test_in_array',
			'isset' 	=> 'test_isset'
		);
		$this->array1 = array('foo', 'bar', 'foobar');
		$this->array2 = array('foo' => true, 'bar' => true, 'foobar' => true);
	}

	protected function test_in_array() {
		in_array('bar', $this->array1);
	}

	protected function test_isset() {
		isset($this->array2['bar']);
	}
}