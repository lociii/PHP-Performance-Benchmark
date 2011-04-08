<?php
/**
 * @see Benchmark_Abstract
 */
require_once 'Benchmark/Abstract.php';

/**
 * @category	Benchmark
 * @package		Test
 * @author		Gevirye Duman <gevriye.duman@kwick.de>
 * @author		Jens Nistler <jens.nistler@kwick.de>
 */
class NotEmptyVsCountVsForeach extends Benchmark_Abstract {
	public function  __construct() {
		$this->array = array();

		$this->file = __FILE__;
		$this->loopCount = 300000;
		$this->name = '!empty vs count vs foreach';
		$this->benchmarks = array(
			'!empty'	=> 'check_not_empty',
			'count'		=> 'check_count',
			'foreach'	=> 'check_foreach',
		);
	}
	protected function check_not_empty() {
		!empty($this->array);
	}

	protected function check_count() {
		count($this->array);
	}

	protected function check_foreach() {
		foreach ($this->array as &$value) {
		}
	}
}
