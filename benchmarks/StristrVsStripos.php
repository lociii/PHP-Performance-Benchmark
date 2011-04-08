<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
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
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class StristrVsStripos extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 100000;
		$this->name = 'stristr vs stripos';
		$this->description = '';
		$this->benchmarks = array(
 			'stristr (true)' => 'test_stristr_true',
			'stristr (false)' => 'test_stristr_false',
			'stripos (true)' => 'test_stripos_true',
			'stripos (false)' => 'test_stripos_false',
		);
		$this->strTrue = 'AAAAAAAAAABBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCWWWWWWWWWWWWWWWWWWWWxWWWWWWWWMMMMMMMMMMMMMMMMMMMMMMMLLLLLLLLLLLLLLLLLLLLllllllllllllmmmmmmmmmmmnnwww';
		$this->strFalse = 'AAAAAAAAAABBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCWWWWWWWWWWWWWWWWWWWWWWWWWWWWMMMMMMMMMMMMMMMMMMMMMMMLLLLLLLLLLLLLLLLLLLLllllllllllllmmmmmmmmmmmnnwww';
	}

	protected function test_stristr_true() {
		stristr($this->strTrue, 'x');
	}

	protected function test_stristr_false() {
		stristr($this->strFalse, 'x');
	}

	protected function test_stripos_true() {
		stripos($this->strTrue, 'x');
	}

	protected function test_stripos_false() {
		stripos($this->strFalse, 'x');
	}
}