<?php

namespace Benchmarks;

use Phalgorithm\Combination\Cnk;
use PhpBench\Benchmark\Metadata\Annotations\BeforeMethods;

/**
 * @BeforeMethods({"init"})
 */
class CnkBench
{
    public function init()
    {
        ini_set('memory_limit', -1);
    }

    public function benchCombinationCn50k2()
    {
        Cnk::run(range(1, 50), 2);
    }

    public function benchCombinationCn50k3()
    {
        Cnk::run(range(1, 50), 3);
    }

    public function benchCombinationCn50k4()
    {
        Cnk::run(range(1, 50), 4);
    }

    public function benchCombinationCn50k5()
    {
        Cnk::run(range(1, 50), 5);
    }

    public function benchCombinationCn50k6()
    {
        Cnk::run(range(1, 50), 6);
    }
}
