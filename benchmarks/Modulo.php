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
class Modulo extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 300000;
		$this->name = 'determining even/odd integers';
		$this->description = 'there are many ways to do it - some of them are very long';
		$this->benchmarks = array(
			'checking for integer' => 'test_integer',
			'modulo operator'	   => 'test_operator',
			'binary'		   => 'test_binary'
		);
		$this->integer = 45645465406;
	}

	protected function test_integer() {
		$modulo = is_int($this->integer / 2);
	}

	protected function test_operator() {
		$modulo = $this->integer % 2;
	}

	protected function test_binary() {
		$modulo = $this->integer & 1;
	}
}