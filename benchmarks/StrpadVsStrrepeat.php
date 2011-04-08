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

/**
 *
 * @category   Benchmark
 * @package    Test
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class StrpadVsStrrepeat extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 20000;
		$this->name = 'str_pad vs. str_repeat';
		$this->description = '';
		$this->benchmarks = array(
			'str_pad'	=> 'test_strpad',
			'str_repeat'	=> 'test_strrepeat'
		);
		$this->testString = '1254';
	}

	protected function test_strpad()
	{
		$foo = $this->testString;
		$foo = str_pad($foo, 5, '0', STR_PAD_LEFT);
	}
	protected function test_strrepeat()
	{
		$foo = $this->testString;
		if (strlen($foo) < 5) {
			$foo = str_repeat('0', 5 - strlen($foo)) . $foo;
		}
	}
}
