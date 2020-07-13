<?php

namespace Benchmarks;

use Phalgorithm\LongPI;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;
use PhpBench\Benchmark\Metadata\Annotations\Warmup;

class LongPIBench
{
    /**
     * @Warmup(1)
     * @Revs(5)
     * @OutputTimeUnit("milliseconds", precision=3)
     */
    public function benchLongPI10digit()
    {
        $pi = (string)(new LongPI(10));
    }

    /**
     * @Warmup(1)
     * @Revs(5)
     * @OutputTimeUnit("seconds", precision=3)
     */
    public function benchLongPI100digit()
    {
        $pi = (string)(new LongPI(100));
    }
}
