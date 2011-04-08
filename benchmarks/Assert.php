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
class Assert extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'assert deactivate';
		$this->description = 'compare the costs of assertions and different ways of disabling assertions';
		$this->benchmarks = array(
			'assert on'	=> 'assert_on',
			'assert off'=> 'assert_off',
			'if'		=> 'assert_if',
		);
	}

	protected function prepare_assert_off() {
		assert_options(ASSERT_ACTIVE, 0);
	}

	protected function prepare_assert_on() {
		assert_options(ASSERT_ACTIVE, 1);
	}

	protected function prepare_assert_if(){
		define('DO_ASSERT', 1);
	}

	protected function assert_on() {
		assert(is_string('abc'));
	}

	protected function assert_off() {
		assert(is_string('abc'));
	}

	protected function assert_if() {
		if (DO_ASSERT && !is_string('abc')) {
			return;
		}
	}
}