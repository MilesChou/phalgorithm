<?php

namespace Phalgorithm;

use Closure;
use InvalidArgumentException;

/**
 * N of M combination
 */
class CombinationNofM
{
    /**
     * @param array $srcArray Source data, total is M elements
     * @param int $n Get N elements in source data
     * @param Closure $storeFunction function($indexArray, $srcArray) return mixed, return custom format
     * @return array
     * @throws InvalidArgumentException
     */
    public static function run(array $srcArray, $n, $storeFunction = null)
    {
        // Total is M elements
        $m = count($srcArray);
        array_unshift($srcArray, '');

        if ($m < $n || $n <= 0) {
            throw new InvalidArgumentException('Input M and N is invalid.');
        }

        // Set store function
        if ($storeFunction === null) {
            $storeFunction = static function ($indexArray, $srcArray) {
                $result = array();
                foreach ($indexArray as $v) {
                    $result[] = $srcArray[$v];
                }
                return $result;
            };
        }

        // Assemble array
        $indexArray = range(1, $n);

        $result = array();

        $result[] = $storeFunction($indexArray, $srcArray);

        while ($indexArray[0] < $m - $n + 1) {
            if ($indexArray[$n - 1] !== $m) {
                $pos = $n - 1;
            } else {
                $pos = $n - 2;
                while ($indexArray[$pos + 1] - $indexArray[$pos] === 1) {
                    --$pos;
                }
            }

            ++$indexArray[$pos];
            for ($i = $pos + 1; $i < $n; ++$i) {
                $indexArray[$i] = $indexArray[$i - 1] + 1;
            }

            $result[] = $storeFunction($indexArray, $srcArray);
        }
        return $result;
    }
}
