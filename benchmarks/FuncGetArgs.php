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
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class FuncGetArgs extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 100000;
		$this->name = 'func_get_args';
		$this->description = 'how much is func_get_args';
		$this->benchmarks = array(
			'enabled'	=> 'enabled',
			'disabled'=> 'disabled'
		);
	}

	protected function enabled() {
		$foo = func_get_args();
		$a = 1 + 1;
	}

	protected function disabled() {
		$a = 1 + 1;
	}
}