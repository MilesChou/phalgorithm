<?php

namespace Algorithm;

use PHPUnit_Framework_TestCase;

class CombinationNofMPerformanceTest extends PHPUnit_Framework_TestCase
{
    private $startTime;

    public function setUp()
    {
        parent::setUp();
        $this->startTime = microtime(true);
    }

    public function tearDown()
    {
        $totaltime = microtime(true) - $this->startTime;
        echo "total time is $totaltime\n";
        parent::tearDown();
    }

    public function testCombination2of50()
    {
        $m = 50;
        $n = 2;
        echo "Testing performance for $n of $m, count = " , $this->getCombinationCount($m, $n) , ', ';
        CombinationNofM::run(range(1, $m), $n);
    }

    public function testCombination3of50()
    {
        $m = 50;
        $n = 3;
        echo "Testing performance for $n of $m, count = " , $this->getCombinationCount($m, $n) , ', ';
        CombinationNofM::run(range(1, $m), $n);
    }

    public function testCombination4of50()
    {
        $m = 50;
        $n = 4;
        echo "Testing performance for $n of $m, count = " , $this->getCombinationCount($m, $n) , ', ';
        CombinationNofM::run(range(1, $m), $n);
    }

    public function testCombination5of30()
    {
        $m = 30;
        $n = 5;
        echo "Testing performance for $n of $m, count = " , $this->getCombinationCount($m, $n) , ', ';
        CombinationNofM::run(range(1, $m), $n);
    }

    public function testCombination5of40()
    {
        $m = 40;
        $n = 5;
        echo "Testing performance for $n of $m, count = " , $this->getCombinationCount($m, $n) , ', ';
        CombinationNofM::run(range(1, $m), $n);
    }

    /**
     * 計算排列組合的總共組合數
     *
     * @param array $collectionSize 總共有多少元素
     * @param int $selectionSize 要取出元素數量
     * @return int
     */
    public static function getCombinationCount($collectionSize, $selectionSize)
    {
        return array_product(range(1, $collectionSize)) /
                ( array_product(range(1, $collectionSize - $selectionSize)) *
                array_product(range(1, $selectionSize)));
    }
}
