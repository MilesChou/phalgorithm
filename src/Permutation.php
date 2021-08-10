<?php

namespace Phalgorithm;

/**
 * @see https://openhome.cc/Gossip/AlgorithmGossip/Permutation.htm
 */
class Permutation
{
    /**
     * @param array $collection
     * @return iterable
     */
    public static function perm(array $collection)
    {
        if (empty($collection)) {
            return [[]];
        }

        if (1 === count($collection)) {
            return [$collection];
        }

        $all = [];

        foreach (self::rotated($collection) as $lt) {
            $p = self::perm(array_slice($lt, 1, count($lt)));

            foreach ($p as $tailPl) {
                $pl = [];
                $pl[] = $lt[0];

                foreach ($tailPl as $item) {
                    $pl[] = $item;
                }

                $all[] = $pl;
            }
        };

        return $all;
    }

    private static function rotated(array $list)
    {
        $rotateTo = function ($index) use ($list) {
            $rotated = [];
            $rotated[] = $list[$index];

            foreach (array_slice($list, 0, $index) as $item) {
                $rotated[] = $item;
            }

            foreach (array_slice($list, $index + 1, count($list)) as $item) {
                $rotated[] = $item;
            }

            return $rotated;
        };

        $all = [];
        $count = count($list);

        for ($i = 0; $i < $count; $i++) {
            $all[] = $rotateTo($i);
        }

        return $all;
    }
}
