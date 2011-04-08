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

define('MAX_AGE', 18);

class foobar {
	const MAX_AGE = 18;
}

/**
 *
 * @category   Benchmark
 * @package    Test
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class ClassConstant extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 500000;
		$this->name = 'global vs. class constants';
		$this->description = 'hash table, namespace etc.';
		$this->benchmarks = array(
			'global constant'	=> 'test_global',
			'class constant'	=> 'test_class');
	}

	protected function test_global() {
		$var = MAX_AGE;
	}

	protected function test_class()	{
		$var = foobar::MAX_AGE;
	}
}