<?php
/**
 * Benchmarks
 *
 * @author    Jens Nistler <jens.nistler@kwick.de>
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
 * @copyright  Copyright (c) 2008-2010 Kwick! GmbH & Co. KG (http://www.kwick.de)
 */
class Serialization extends Benchmark_Abstract {
	protected $fixture = 'fixtures/data.php';

	public function  __construct() {
		$this->file = __FILE__;
		$this->loopCount = 10000;
		$this->name = 'include vs. serialize vs. json';
		$this->description = 'which format is faster for saving data';
		$this->benchmarks = array(
			'include (php code)'	=> 'test_include',
			'serialize'				=> 'test_serialize',
			'json'					=> 'test_json',
		);

		// prepare fixture
		$this->fixture = dirname($this->file).DIRECTORY_SEPARATOR.$this->fixture;
		/* @var array $data */
		$data = require $this->fixture;

		$this->fixtureSerialize = dirname($this->fixture).DIRECTORY_SEPARATOR.'dataSerialize.txt';
		file_put_contents($this->fixtureSerialize, serialize($data));

		$this->fixtureJson = dirname($this->fixture).DIRECTORY_SEPARATOR.'dataJson.txt';
		file_put_contents($this->fixtureJson, json_encode($data));

		// check igbinary format if extension is available
		if (function_exists('igbinary_serialize')) {
			$this->fixtureIgbinary = dirname($this->fixture).DIRECTORY_SEPARATOR.'dataIgb.txt';
			file_put_contents($this->fixtureIgbinary, igbinary_serialize($data));
			$this->name.= ' vs. igbinary';
			$this->benchmarks['igbinary'] = 'test_igbinary';
		}
	}

	public function __destruct() {
		// unlink additional fixtures
		unlink($this->fixtureSerialize);
		unlink($this->fixtureJson);
		unlink($this->fixtureIgbinary);
	}

	protected function test_include() {
		$data = require $this->fixture;
	}

	protected function test_serialize()	{
		$data = file_get_contents($this->fixtureSerialize);
		$data = unserialize($data);
	}

	protected function test_json()	{
		$data = file_get_contents($this->fixtureJson);
		$data = json_decode($data);
	}

	protected function test_igbinary() {
		$data = file_get_contents($this->fixtureIgbinary);
		$data = igbinary_unserialize($data);
	}
}
