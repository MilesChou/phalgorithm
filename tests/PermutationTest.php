<?php

namespace Tests;

use Phalgorithm\LongPI;
use Phalgorithm\Permutation;
use PHPUnit\Framework\TestCase;

class PermutationTest extends TestCase
{
    /**
     * @test
     */
    public function shouldReturnEmptyItemWhenEmptyItem()
    {
        $this->assertSame([[]], Permutation::perm([]));
    }

    /**
     * @test
     */
    public function shouldReturnOneItemWhenOneItem()
    {
        $this->assertSame([[1]], Permutation::perm([1]));
    }

    /**
     * @test
     */
    public function shouldReturnRotateItemWhenTwoItem()
    {
        $this->assertSame([[1, 2], [2, 1]], Permutation::perm([1, 2]));
    }
}
