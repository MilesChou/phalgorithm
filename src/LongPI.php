<?php

namespace Phalgorithm;

use Brick\Math\BigInteger;
use Brick\Math\RoundingMode;

/**
 * @see https://openhome.cc/Gossip/AlgorithmGossip/LongPI.htm
 */
class LongPI
{
    /**
     * @var BigInteger
     */
    private $pi;

    /**
     * LongPI constructor.
     * @param int $l
     */
    public function __construct($l)
    {
        $n = (int)($l / 1.39793 + 1);
        $b25 = BigInteger::of(25);
        $b57121 = BigInteger::of(57121);
        $scale = BigInteger::of(10)->power($l);

        $w = BigInteger::of(16 * 5)->multipliedBy($scale);
        $v = BigInteger::of(4 * 239)->multipliedBy($scale);
        $s = BigInteger::of(0);

        for ($k = 1; $k <= $n; $k++) {
            $w = $w->dividedBy($b25, RoundingMode::UP);
            $v = $v->dividedBy($b57121, RoundingMode::UP);
            $q = $w->minus($v)->dividedBy(BigInteger::of(2 * $k - 1), RoundingMode::UP);
            $s = $k % 2 === 1 ? $s->plus($q) : $s->minus($q);
        }

        $this->pi = $s;
    }

    public function __toString()
    {
        $str = $this->pi->__toString();
        return $str[0] . '.' . substr($str, 1);
    }
}
