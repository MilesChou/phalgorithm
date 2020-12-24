<?php

namespace Phalgorithm;

class FibonacciRecursive
{
    public static function calculate($n)
    {
        if ($n < 2) {
            return 1;
        }

        return self::calculate($n - 2) + self::calculate($n - 1);
    }
}
