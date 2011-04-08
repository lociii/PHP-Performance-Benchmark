<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 *  @see Benchmark_Abstract
 */
require_once 'Benchmark/Abstract.php';

class StaticClass {
	public function dynamic_function() {
		return true;
	}

	public static function static_function() {
		return true;
	}
}

/**
 *
 * @category   Benchmark
 * @package    Test
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class StaticClassCall extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'static vs. dynamic defintions when calling static';
		$this->description = 'using a dynamic class function by a static call compared to a static defined one';
		$this->benchmarks = array(
			'defined dynamic'	=> 'test_dynamic',
			'defined static'	=> 'test_static'
		);
	}

	public function execute() {
		$this->markSkipped();
	}

	protected function test_dynamic() {
		StaticClass::dynamic_function();
	}

	protected function test_static() {
		StaticClass::static_function();
	}
}