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
class ErrorBlocking extends Benchmark_Abstract {
	private $errorLevel;

	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'error blocking operator (@) vs. temporary disabled error reporting';
		$this->description = 'the error blocking operator is one of the most expensive characters in php\'s dictionary. temporarily disable error reporting instead.';
		$this->benchmarks = array(
			'error blocking operator'	=> 'error_blocking',
			'disable error reporting'	=> 'error_reporting'
		);
	}

	protected function foobar() {
		return $array;
	}

	protected function error_blocking() {
		@$this->foobar();
	}

	protected function prepare_error_reporting() {
		$this->errorLevel = error_reporting(0);
	}

	protected function error_reporting() {
		$this->foobar();
	}

	protected function close_error_reporting() {
		error_reporting($this->errorLevel);
	}
}