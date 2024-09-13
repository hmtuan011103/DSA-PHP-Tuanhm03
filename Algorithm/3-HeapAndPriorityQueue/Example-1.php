<?php
    function kSmallestPairs($nums1, $nums2, $k): array
    {
        $result = [];
        $heap = new SplMinHeap();

        foreach ($nums1 as $num) {
            $heap->insert([$num + $nums2[0], 0]);
        }

        while ($k > 0 && !$heap->isEmpty()) {
            $pair = $heap->extract();
            $nums_sum = $pair[0];
            $index = $pair[1];

            $result[] = [$nums_sum - $nums2[$index], $nums2[$index]];

            if ($index + 1 < count($nums2)) {
                $heap->insert([$nums_sum - $nums2[$index] + $nums2[$index + 1], $index + 1]);
            }

            $k--;
        }

        return $result;
    }

    kSmallestPairs([1,7,11], [2,4,6], 3);
    // kSmallestPairs([1,1,2], [1,2,3], 2);