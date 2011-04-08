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
class IncrementUnitialized extends Benchmark_Abstract {
	private $errorLevel;

	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 300000;
		$this->name = 'initialize variables before incrementing';
		$this->description = 'incrementing an unitialized variable is damn slow';
		$this->benchmarks = array(
			'uninitialized variable'	=> 'uninitialized',
			'initialized variable'	=> 'initialized'
		);
	}

	protected function prepare_uninitialized() {
		$this->errorLevel = error_reporting(0);
	}

	protected function uninitialized() {
		unset($j);
		$j++;
	}

	protected function close_uninitialized() {
		error_reporting($this->errorLevel);
	}

	protected function initialized() {
		unset($j);
		$j = 0;
		$j++;
	}
}