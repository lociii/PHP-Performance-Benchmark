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
class AppendString extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 30000;
		$this->name = 'append string';
		$this->description = 'compare methods of appending strings to a string';
		$this->benchmarks = array(
			'complete string'	=> 'complete_string',
			'dot like'			=> 'dot_like',
		);
		$this->str = 'abc';
	}
	protected function complete_string() {
		$var = $this->str;
		$var = $var . 'addstring';
	}

	protected function dot_like() {
		$var = $this->str;
		$var .= 'addstring';
	}
}