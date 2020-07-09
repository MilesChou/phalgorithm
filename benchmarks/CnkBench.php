<?php

namespace Benchmarks;

use Phalgorithm\Combination\Cnk;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Warmup;

class CnkBench
{
    /**
     * @Warmup(1)
     * @OutputTimeUnit("milliseconds", precision=3)
     */
    public function benchCombinationCn50k4()
    {
        Cnk::run(range(1, 50), 4);
    }

    /**
     * @Warmup(1)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function benchCombinationCn50k5()
    {
        Cnk::run(range(1, 50), 5);
    }

    /**
     * @Warmup(1)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function benchCombinationCn50k6()
    {
        Cnk::run(range(1, 50), 6);
    }
}
