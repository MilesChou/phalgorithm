<?php

namespace Tests;

use Phalgorithm\FibonacciRecursive;
use Phalgorithm\LongPI;
use PHPUnit\Framework\TestCase;

class FibonacciRecursiveTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBeOkayWhenInput1to10()
    {
        self::assertSame(1, FibonacciRecursive::calculate(1));
        self::assertSame(2, FibonacciRecursive::calculate(2));
        self::assertSame(3, FibonacciRecursive::calculate(3));
        self::assertSame(5, FibonacciRecursive::calculate(4));
        self::assertSame(8, FibonacciRecursive::calculate(5));
        self::assertSame(13, FibonacciRecursive::calculate(6));
        self::assertSame(21, FibonacciRecursive::calculate(7));
        self::assertSame(34, FibonacciRecursive::calculate(8));
    }

    /**
     * @test
     */
    public function shouldReturn314159When5Digit()
    {
        self::assertSame('3.14159', (string)(new LongPI(5)));
    }
}