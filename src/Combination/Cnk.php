<?php

namespace Phalgorithm\Combination;

use InvalidArgumentException;

/**
 * The number of k-combinations, C(n, k), n > k
 *
 * @see https://en.wikipedia.org/wiki/Combination#Number_of_k-combinations
 */
class Cnk
{
    /**
     * @param array $srcArray Source data, total is N elements
     * @param int $k Get K elements in source data
     * @param callable $storeFunction function($indexArray, $srcArray) return mixed, return custom format
     * @return array
     * @throws InvalidArgumentException
     */
    public static function run(array $srcArray, $k, $storeFunction = null)
    {
        // Total is N elements
        $n = count($srcArray);
        array_unshift($srcArray, '');

        if ($n < $k || $k <= 0) {
            throw new InvalidArgumentException('Input N and K is invalid.');
        }

        // Set store function
        if ($storeFunction === null) {
            $storeFunction = static function ($indexArray, $srcArray) {
                $result = [];
                foreach ($indexArray as $v) {
                    $result[] = $srcArray[$v];
                }
                return $result;
            };
        }

        // Assemble array
        $indexArray = range(1, $k);

        $result = [];

        $result[] = $storeFunction($indexArray, $srcArray);

        while ($indexArray[0] < $n - $k + 1) {
            if ($indexArray[$k - 1] !== $n) {
                $pos = $k - 1;
            } else {
                $pos = $k - 2;
                while ($indexArray[$pos + 1] - $indexArray[$pos] === 1) {
                    --$pos;
                }
            }

            ++$indexArray[$pos];
            for ($i = $pos + 1; $i < $k; ++$i) {
                $indexArray[$i] = $indexArray[$i - 1] + 1;
            }

            $result[] = $storeFunction($indexArray, $srcArray);
        }

        return $result;
    }
}
