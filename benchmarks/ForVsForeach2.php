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
class ForVsForeach2 extends Benchmark_Abstract {
	private $array;
	private $count;

	public function __construct() {
		$this->file = __FILE__;
		$this->loopCount = 1000;
		$this->name = 'for and foreach (array loop) - part 2';
		$this->description = 'looping through an array with 1000 elements using for and foreach (saving the count when using for)<br />please consider that this result will never happen in reality - or do you loop the same array %s times?';
		$this->benchmarks = array(
			'for' 	=> 'test_for',
			'foreach' 	=> 'test_foreach'
		);
	}

	public function execute() {
		parent::execute();
		$this->description = sprintf($this->description, number_format($this->loopCount, 0, ',', '.'));
	}

	protected function prepare() {
		$this->array = array();

		for ($i = 0; $i < 1000; ++$i) {
			$this->array[] = rand(1, 1000);
		}
	}

	protected function prepare_test_for() {
		$this->count = count($this->array);
	}

	protected function test_for() {
		for ($j = 0; $j < $this->count; ++$j) {
			$var = $this->array[$j];
		}
	}

	protected function test_foreach() {
		foreach ($this->array as $key => $value) {
			$var = $value;
		}
	}
}