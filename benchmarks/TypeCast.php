<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
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
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class TypeCast extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 50000;
		$this->name = 'type cast';
		$this->description = 'compare kinds of typecasting';
		$this->benchmarks = array(
			'juggling'	=> 'juggling',
			'function'	=> 'typecast',
			'settype'	=> 'settype',
		);
		$this->str = 42545.54699;
	}
	protected function juggling() {
		$var = (int)$this->str;
	}

	protected function typecast() {
		$var = intval($this->str);
	}

	protected function settype() {
		$var = settype($this->str, 'int');
	}
}