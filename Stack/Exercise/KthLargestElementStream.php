<?php

class KthLargest {
    private int $k;
    private array $stack;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct(int $k, array $nums) {
        $this->k = $k;
        $this->stack = [];

        rsort($nums);
        $min = min($k, count($nums));
        for ($i = 0; $i < $min; $i++) {
            $this->stack[] = $nums[$i];
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add(int $val): int
    {
        if (count($this->stack) < $this->k) {
            $this->stack[] = $val;
            rsort($this->stack);
        } elseif ($val > end($this->stack)) {
            array_pop($this->stack);
            $this->stack[] = $val;
            rsort($this->stack);
        }

        return end($this->stack);
    }
}

$kthLargest = new KthLargest(3, [4, 5, 8, 2]);
echo $kthLargest->add(3);
echo $kthLargest->add(5);
echo $kthLargest->add(10);
echo $kthLargest->add(9);
echo $kthLargest->add(4);
