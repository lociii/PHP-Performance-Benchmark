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
class FuncGetArgsVsFuncGetArg extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 400000;
		$this->name = 'func_get_args';
		$this->description = 'how much is func_get_args';
		$this->benchmarks = array(
			'func_get_args'	=> 'func_get_args',
			'func_get_arg'=> 'func_get_arg'
		);
	}

	protected function func_get_args() {
		$this->func_get_args_Inner(1);
	}

	protected function func_get_arg() {
		$this->func_get_arg_Inner(1);
	}

	protected function func_get_args_Inner() {
		$foo = func_get_args();
	}

	protected function func_get_arg_Inner() {
		$foo = func_get_arg(0);
	}
}