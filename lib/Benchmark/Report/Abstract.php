<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
 * @author    Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */

/**
 *
 *
 * @category   Benchmark
 * @package    Report
 * @author     Jens Nistler <jens.nistler@kwick.de>
 * @author     Sven Strittmatter <sven.strittmatter@kwick.de>
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
abstract class Benchmark_Report_Abstract {
	/**
	 *
	 * @var Benchmark_Abstract
	 */
	protected $benchmark;
	/**
	 *
	 * @var array
	 */
	private $comosition;
	/**
	 *
	 * @param Benchmark_Abstract $benchmark
	 */
	public function  __construct(Benchmark_Abstract $benchmark) {
		$this->benchmark = $benchmark;
	}

	/**
	 * @return string
	 */
	public function  __toString() {
		$string = '';

		foreach ($this->getComposition() as $item) {
			$string .= $item;
		}

		return $string;
	}

	public function getComposition() {
		if (null === $this->comosition) {
			$this->comosition = $this->createComposition();
		}

		return $this->comosition;
	}

	abstract protected function createComposition();
}