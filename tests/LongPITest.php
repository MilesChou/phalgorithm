<?php

namespace Tests;

use Phalgorithm\LongPI;
use PHPUnit\Framework\TestCase;

class LongPITest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturn314When2Digit()
    {
        self::assertSame('3.14', (string)(new LongPI(2)));
    }

    /**
     * @test
     */
    public function shouldReturn314159When5Digit()
    {
        self::assertSame('3.14159', (string)(new LongPI(5)));
    }
}