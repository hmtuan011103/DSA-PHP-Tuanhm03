<?php

class FindSecondLargest {

    public function findSecondLargest(array $arr): string
    {
        $n = count($arr);

        if ($n < 2) {
            return 'Array needs at least two elements';
        }

        $first = $second = $arr[0];

        // 1,3,4,5,0,2
        // 1 3 ,7, 4

        for ($i = 1; $i < $n; $i++) {
            if ($arr[$i] > $first) {
                $second = $first;
                $first = $arr[$i];
            }
            elseif ($arr[$i] > $second && $arr[$i] !== $first) {
                $second = $arr[$i];
            }
        }

        if ($first === $second) {
            return "No second largest element found";
        }

        return 'The second largest element is ' . $second;
    }

}

$arr = [1,3,4,5,0,2];
$findSecondLargest = new FindSecondLargest();
print_r($findSecondLargest->findSecondLargest($arr));

