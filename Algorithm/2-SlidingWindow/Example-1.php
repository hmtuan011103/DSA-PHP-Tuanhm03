<?php

    function maxSumSubarrayK($arr, $n, $k) {
        if ($n < $k) {
            return "Invalid";
        }

        $maxSum = PHP_INT_MIN;

        for ($i = 0; $i <= $n - $k; $i++) {
            $currentSum = 0;

            for ($j = 0; $j < $k; $j++) {
                $currentSum += $arr[$i + $j];
            }

            $maxSum = max($maxSum, $currentSum);
        }

        return $maxSum;
    }

    function maxSumSubarrayKSlidingWindow($arr, $n, $k)
    {
        if ($n < $k) {
            return "Invalid";
        }

//        trade-off
//        $windowSum = 0;
//        for ($i = 0; $i < $k; $i++) {
//            $windowSum += $arr[$i];
//        }

        $windowSum = array_sum(array_slice($arr, 0, $k));
        $maxSum = $windowSum;

        for ($i = $k; $i < $n; $i++) {
            $windowSum = $windowSum - $arr[$i - $k] + $arr[$i];
            $maxSum = max($maxSum, $windowSum);
        }

        return $maxSum;
    }

    /*
     *
     * Logical Thinking:
     * 9 - 4 = 5 => 0 1 2 3 4 5
     * 4 => 0 1 2 3
     * 0 1 2 3
     * 1 2 3 4
     * 2 3 4 5
     * 3 4 5 6
     * 4 5 6 7
     * 5 6 7 8
    */

    $arr = [1, 4, 2, 10, 23, 3, 1, 0, 20];
    $k = 4;
    $n = count($arr);

    $result = maxSumSubarrayK($arr, $n, $k);
    $result2 = maxSumSubarrayKSlidingWindow($arr, $n, $k);
    echo "Tổng lớn nhẩt của mảng con có kích thước $k với logic thông thường là: $result \n";
    echo "Tổng lớn nhẩt của mảng con có kích thước $k với sliding window là: $result2";