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

class testClass {
	private $data = array();

	public function __get($key) {
		return $this->data[$key];
	}

	public function __set($key, $value) {
		$this->data[$key] = $value;
	}

	public function get($key) {
		return $this->data[$key];
	}

	public function set($key, $value) {
		$this->data[$key] = $value;
	}
}

/**
 *
 * @category   Benchmark
 * @package    Test
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Magic extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 50000;
		$this->name = 'magic functions';
		$this->description = 'compare magic get/set vs. straight implementations';
		$this->benchmarks = array(
			'magic'		=> 'magic',
			'straight'	=> 'straight',
		);
		$this->str = 'i am just a test string';
		$this->object = new testClass;
	}
	protected function magic() {
		$this->object->test = $this->str;
		$var = $this->object->test;
	}

	protected function straight() {
		$this->object->set('test', $this->str);
		$var = $this->object->get('test');
	}
}