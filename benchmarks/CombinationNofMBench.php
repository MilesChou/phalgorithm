<?php

namespace Benchmarks;

use Algorithm\CombinationNofM;

class CombinationNofMBench
{
    public function benchCombination2of50()
    {
        CombinationNofM::run(range(1, 50), 2);
    }

    public function benchCombination3of50()
    {
        CombinationNofM::run(range(1, 50), 3);
    }

    public function benchCombination4of50()
    {
        CombinationNofM::run(range(1, 50), 4);
    }

    public function benchCombination5of30()
    {
        CombinationNofM::run(range(1, 30), 5);
    }

    public function benchCombination5of40()
    {
        CombinationNofM::run(range(1, 40), 5);
    }
}
