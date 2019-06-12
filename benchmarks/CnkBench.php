<?php

namespace Benchmarks;

use Phalgorithm\Combination\Cnk;

class CnkBench
{
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

    public function benchCombinationCn30k5()
    {
        Cnk::run(range(1, 30), 5);
    }

    public function benchCombinationCn40k5()
    {
        Cnk::run(range(1, 40), 5);
    }
}
