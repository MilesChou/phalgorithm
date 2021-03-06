<?php

namespace Tests\Combination;

use InvalidArgumentException;
use Phalgorithm\Combination\Cnk;
use PHPUnit\Framework\TestCase;

class CnkTest extends TestCase
{
    const START_NUMBER = 1;

    /**
     * Throws exception when selection is greater than collection.
     */
    public function testExceptionWhenSelectionGtCollection()
    {
        $this->expectException(InvalidArgumentException::class);

        // Arrange
        $collection = 3;
        $selection = 5;
        $inputSet = $this->getInputSet($collection);

        // Act
        Cnk::run($inputSet, $selection);
    }

    /**
     * Throws exception when selection is less than or equal zero.
     */
    public function testExceptionSelectionLteZero()
    {
        $this->expectException(InvalidArgumentException::class);

        // Arrange
        $collection = 5;
        $selection = 0;
        $inputSet = $this->getInputSet($collection);

        // Act
        Cnk::run($inputSet, $selection);
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
        $result = Cnk::run($inputSet, $selection);

        // Assert
        $this->assertCount(1, $result);
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
        $result = Cnk::run($inputSet, $selection);

        // Assert
        $this->assertCount($expectCount, $result);
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
        $result = Cnk::run($inputSet, $selection);

        // Assert
        $this->assertCount($expectCount, $result);
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
        $result = Cnk::run($expectSet, $selection);

        // Assert
        $this->assertCount($expectCount, $result);
        $this->assertTrue($this->resultIsInExpectedSet($expectSet, $result));
    }

    /**
     * Assert result is excepted
     *
     * @param array $expectSet
     * @param array $results
     * @return boolean
     */
    public function resultIsInExpectedSet($expectSet, $results): bool
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
     * Assemble count
     *
     * @param int $collectionSize
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
    public function getResultSetExpected($collectionSize): array
    {
        $result = $this->getInputSet($collectionSize);
        foreach ($result as $k => $v) {
            $result[$k] = str_pad((int) $v, 2, '0', STR_PAD_LEFT);
        }
        return $result;
    }

    /**
     * @param int $collectionSize
     * @return array
     */
    public function getInputSet(int $collectionSize): array
    {
        $collection = range(self::START_NUMBER, $collectionSize);
        // Integer to string
        foreach ($collection as $k => $v) {
            $collection[$k] = str_pad((int) $v, 2, '0', STR_PAD_LEFT);
        }

        return $collection;
    }
}
