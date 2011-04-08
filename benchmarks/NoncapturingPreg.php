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
class NoncapturingPreg extends Benchmark_Abstract {
	public function  __construct() {
		$this->file = __FILE__;
		$this->name = 'preg_match capturing vs. non capturing';
		$this->description = 'preg_match only for validating purposes doesn\'t need to capture results';
		$this->benchmarks = array(
			'capturing'     => 'capturing',
			'non capturing' => 'non_capturing');
		$this->string = 'jens.nistler@kwick.de';
	}

	protected function capturing() {
		preg_match('/(.*)@(.*)/i', $this->string);
	}

	protected function non_capturing() {
		preg_match('/(?:.*)@(?:.*)/i', $this->string);
	}
}