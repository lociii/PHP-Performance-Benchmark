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
class ArrayKeyExistsVsIsset extends Benchmark_Abstract {
	private $array = array();

	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'checking the existence of an array key with in_array and isset';
		$this->description = 'comparing the existence check speed between a numbered array vs. an array using the values as keys with isset';
		$this->benchmarks = array(
			'array_key_exists' 	=> 'test_array_key_exists',
			'isset' 		=> 'test_isset',
			'issetCheckNull'	=> 'test_isset_null');
		for ($i = 0; $i <= 1000; $i++) {
			$this->array['bar'.$i] = 'foobar';
		}
	}

	protected function test_array_key_exists() {
		array_key_exists('bar500', $this->array);
	}

	protected function test_isset() {
		isset($this->array['bar500']);
	}

	protected function test_isset_null() {
		isset($this->array['bar500']) && $this->array['bar500'] !== null;
	}
}
