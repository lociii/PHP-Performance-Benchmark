<?php
/**
 * @see Benchmark_Abstract
 */
require_once 'Benchmark/Abstract.php';

/**
 * @category	Benchmark
 * @package		Test
 * @author		Gevirye Duman <gevriye.duman@kwick.de>
 */
class NewVsClone extends Benchmark_Abstract {
	public function  __construct() {
		$this->class = "NewVsClone_TestClass";
		$this->obj = new $this->class;

		$this->file = __FILE__;
		$this->loopCount = 30000;
		$this->name = 'new vs clone';
		$this->benchmarks = array(
			'new'	=> 'operator_new',
			'clone'		=> 'operator_clone',
		);
	}
	protected function operator_new() {
		$a = new $this->class;
	}

	protected function operator_clone() {
		$a = clone $this->obj;
	}
}

class NewVsClone_TestClass {
	private $a;
	private $b;
	private $c;
}
