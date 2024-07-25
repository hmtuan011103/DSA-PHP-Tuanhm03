<?php

class CountEvenOddNumbers {

    public function countEvenOddNumbers(array $arr): void
    {
        $n = sizeof($arr);
        $countOddNumbers = 0;
        $countEvenNumbers = 0;
        for ($i = 0; $i < $n; $i++) {
           $arr[$i] % 2 !== 0 ? $countOddNumbers++ : $countEvenNumbers++;
        }

        echo 'The number of odd numbers is ' . $countEvenNumbers;
        echo "\n";
        echo 'The number of even numbers is ' . $countOddNumbers;
    }

}

$arr = [1,2,3,4,5];
$countEvenOddNumbers = new CountEvenOddNumbers();
$countEvenOddNumbers->countEvenOddNumbers($arr);

