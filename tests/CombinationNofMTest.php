<?php

namespace Tests;

use InvalidArgumentException;
use Phalgorithm\CombinationNofM;
use PHPUnit_Framework_TestCase;

class CombinationNofMTest extends PHPUnit_Framework_TestCase
{
    const START_NUMBER = 1;

    /**
     * Throws exception when selection is greater than collection.
     *
     * @expectedException InvalidArgumentException
     */
    public function testExceptionWhenSelectionGtCollection()
    {
        // Arrange
        $collection = 3;
        $selection = 5;
        $inputSet = $this->getInputSet($collection);

        // Act
        CombinationNofM::run($inputSet, $selection);
    }

    /**
     * Throws exception when selection is less than or equal zero.
     *
     * @expectedException InvalidArgumentException
     */
    public function testExceptionSelectionLteZero()
    {
        // Arrange
        $collection = 5;
        $selection = 0;
        $inputSet = $this->getInputSet($collection);

        // Act
        CombinationNofM::run($inputSet, $selection);
    }

    /**
     * Single test
     */
    public function testSingle()
    {
        // Arrange
        $collection = 4;
        $selection = 4;
        $inputSet = $this->getInputSet($collection);

        // Act
        $result = CombinationNofM::run($inputSet, $selection);

        // Assert
        $this->assertEquals(1, count($result));
        $this->assertTrue($this->resultIsInExpectedSet($inputSet, $result));
    }

    /**
     * Basic test
     */
    public function testBasic()
    {
        // Arrange
        $collection = 5;
        $selection = 3;
        $inputSet = $this->getInputSet($collection);
        $expectSet = $this->getResultSetExpected($collection);
        $expectCount = $this->getCombinationCount($collection, $selection);

        // Act
        $result = CombinationNofM::run($inputSet, $selection);

        // Assert
        $this->assertEquals($expectCount, count($result));
        $this->assertTrue($this->resultIsInExpectedSet($expectSet, $result));
    }

    /**
     * Advanced test
     */
    public function testAdvanced()
    {
        // Arrange
        $collection = 15;
        $selection = 5;
        $inputSet = $this->getInputSet($collection);
        $expectSet = $this->getResultSetExpected($collection);
        $expectCount = $this->getCombinationCount($collection, $selection);

        // Act
        $result = CombinationNofM::run($inputSet, $selection);

        // Assert
        $this->assertEquals($expectCount, count($result));
        $this->assertTrue($this->resultIsInExpectedSet($expectSet, $result));
    }

    /**
     * Mixed input test
     */
    public function testMixedInput()
    {
        // Arrange
        $expectSet = array(
            'abc', 'bcd', 'cde', 'def', 'esdf', 'fadf',
            'ggdfa', 'qwh', 'asfgi', 'fkuj', 'rtujk',
            'l;oi', 'mg', 'rtn', '55so'
        );
        $collection = count($expectSet);
        $selection = 5;
        $expectCount = $this->getCombinationCount($collection, $selection);

        // Act
        $result = CombinationNofM::run($expectSet, $selection);

        // Assert
        $this->assertEquals($expectCount, count($result));
        $this->assertTrue($this->resultIsInExpectedSet($expectSet, $result));
    }

    /**
     * Assert result is excepted
     *
     * @param array $expectSet
     * @param array $results
     * @return boolean
     */
    public function resultIsInExpectedSet($expectSet, $results)
    {
        foreach ($results as $result) {
            foreach ($result as $item) {
                if (!in_array($item, $expectSet, true)) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Assamble count
     *
     * @param array $collectionSize
     * @param int $selectSize
     * @return int
     */
    public function getCombinationCount($collectionSize, $selectSize)
    {
        return array_product(range(1, $collectionSize)) /
                ( array_product(range(1, $collectionSize - $selectSize)) *
                array_product(range(1, $selectSize)));
    }

    /**
     * @param int $collectionSize
     * @return array
     */
    public function getResultSetExpected($collectionSize)
    {
        $result = self::getInputSet($collectionSize);
        foreach ($result as $k => $v) {
            $result[$k] = str_pad((int) $v, 2, '0', STR_PAD_LEFT);
        }
        return $result;
    }

    /**
     * @param int $collectionSize
     * @return array
     */
    public function getInputSet($collectionSize)
    {
        $collection = range(self::START_NUMBER, $collectionSize);
        // Integer to string
        foreach ($collection as $k => $v) {
            $collection[$k] = str_pad((int) $v, 2, '0', STR_PAD_LEFT);
        }
        return $collection;
    }
}
