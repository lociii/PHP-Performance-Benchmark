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
class TernaryVsIfElse extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 500000;
		$this->name = 'ternary operator vs. if/else';
		$this->description = 'comparing the ternary shortcut with a full if/else';
		$this->benchmarks = array(
			'ternary'	=> 'test_ternary',
			'if/else'	=> 'test_if'
		);
	}

	protected function test_ternary() {
		$foo = true ? 'bar' : 'foo';
	}

	protected function test_if() {
		if (true) {
			$foo = 'bar';
		} else {
			$foo = 'foo';
		}
	}
}