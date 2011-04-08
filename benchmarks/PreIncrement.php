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
class PreIncrement extends Benchmark_Abstract {
    public function  __construct() {
        $this->file = __FILE__;
	$this->loopCount = 400000;
	$this->name = 'pre and post increment';
	$this->description = 'post incrementing forces php to save the variable before incrementing it because it\'s original value is returned instead of the incremented one';
	$this->benchmarks = array(
            'post increment' => 'test_post',
            'pre increment'  => 'test_pre');
    }
	
    protected function test_post() {
        $j = 0;
        $j++;
    }

    protected function test_pre() {
        $j = 0;
        ++$j;
    }
}