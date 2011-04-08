<?php

/**
 * @see Benchmark_Abstract
 */
require_once 'Benchmark/Abstract.php';

class TryCatch extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'try catch';
		$this->description = 'check the performance impact of try/catch';
		$this->loopCount = 200000;
		$this->benchmarks = array(
			'no try/catch'	=> 'standard',
			'empty catch'	=> 'emptyCatch',
			'empty try'		=> 'emptyTry',
			'with catch'	=> 'withCatch',
			'nested try/catch'	=> 'nested',
			'nested try/catch2'	=> 'nested2',
		);
	}

	protected function standard() {
		$foo = 'bar';
	}

	protected function emptyCatch() {
		try {
			$foo = 'bar';
		}
		catch (Exception $e) {
			// do nothing
		}
	}

	protected function emptyTry() {
		try {
			// nothing here
		}
		catch (Exception $e) {
			// do nothing
		}
	}

	protected function withCatch() {
		try {
			$foo = 'bar';
		}
		catch (Exception $e) {
			$foo = 'bar';
		}
	}

	protected function nested() {
		try {
			try {
				$foo = 'bar';
			}
			catch (Exception $e) {
				$foo = 'bar';
			}
		}
		catch (Exception $e) {
			$foo = 'bar';
		}
	}

	protected function nested2() {
		try {
			try {
				try {
					$foo = 'bar';
				}
				catch (Exception $e) {
					$foo = 'bar';
				}
			}
			catch (Exception $e) {
				$foo = 'bar';
			}
		}
		catch (Exception $e) {
			$foo = 'bar';
		}
	}
}