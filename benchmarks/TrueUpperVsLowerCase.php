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
class trueUpperVsLowerCase extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 500000;
		$this->name = 'lowercase vs uppercase for language constructs';
		$this->description = 'php needs to lowercase those statements';
		$this->benchmarks = array(
			'lowercase' => 'test_lower',
			'uppercase' => 'test_upper'
		);
	}

	protected function test_lower() {
		$var = true;
	}

	protected function test_upper() {
		$var = TRUE;
	}
}