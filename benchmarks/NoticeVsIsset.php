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
class NoticeVsIsset extends Benchmark_Abstract {
	private $errorLevel;
	private $array;

	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 500000;
		$this->name = 'notice vs isset on uninitialized array key';
		$this->description = 'hiding errors doesn\'t mean they\'re not thrown - just force php not to throw them';
		$this->benchmarks = array(
			'disabling errors'	=> 'test_error',
			'preventing errors'	=> 'test_isset',
		);
		$this->array = array();
	}

	protected function prepare_test_error() {
		$this->errorLevel = error_reporting(0);
	}

	protected function test_error() {
		$foo = $this->array['bar'];
	}

	protected function close_test_error() {
		error_reporting($this->errorLevel);
	}

	protected function test_isset() {
		if (isset($this->array['bar'])) {
			$foo = $this->array['bar'];
		}
	}
}
