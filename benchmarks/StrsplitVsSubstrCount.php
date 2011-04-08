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
class StrsplitVsSubstrCount extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 10000;
		$this->name = 'str_split vs substr_count';
		$this->benchmarks = array(
			'str_split' => 'test_str_split',
			'substr_count' => 'test_substr_count'
		);
		$this->str = 'AAAAAAAAAABBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCWWWWWWWWWWWWWWWWWWWWWWWWWWWWMMMMMMMMMMMMMMMMMMMMMMMLLLLLLLLLLLLLLLLLLLLllllllllllllmmmmmmmmmmmnnwww';
	}

	protected function test_str_split($length = 30) {
		// determine how many m's and w's in this string, and then changing the length for shorting
		$char = str_split(strtolower($this->str));
		$MsWs = 0;

		foreach ($char as $value) {
			if ($value == 'm' || $value == 'w'){
				$MsWs++;
			}
		}

		if ($MsWs > 4) {
			$length = $length - 10;
		}
	}

	protected function test_substr_count($length = 30) {
		// determine how many m's and w's in this string, and then changing the length for shorting
		$determine = null;
		$lower = strtolower($this->str);

		try {
			if(($wCount = substr_count($this->str, 'w')) > 4) {
				throw new Exception();
			}

			if(substr_count($this->str, 'm') + $wCount > 4) {
				throw new Exception();
			}
		} catch (Exception $e) {
			$length = $length - 10;
		}
	}
}