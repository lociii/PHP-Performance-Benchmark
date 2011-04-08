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
class Quotes extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 200000;
		$this->name = 'single and double quotes';
		$this->benchmarks = array(
			'single quote' => 'test_single',
			'double quote' => 'test_double',
			'double quote concat' => 'test_double_concat',
		);
		$this->str = 'abc';
	}

	protected function test_single() {
		$foo = $this->str.'abc'.$this->str.'abc'.$this->str.'abc'.$this->str.'abc'.$this->str.'abc'.$this->str.'abc';
	}

	protected function test_double_concat() {
		$foo = $this->str."abc".$this->str."abc".$this->str."abc".$this->str."abc".$this->str."abc".$this->str."abc";
	}

	protected function test_double() {
		$foo = "{$this->str}abc{$this->str}abc{$this->str}abc{$this->str}abc{$this->str}abc{$this->str}abc";
	}
}