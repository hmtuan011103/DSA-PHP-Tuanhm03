<?php


function GetOptimalContentStorage(array $n): int
{
    $lengthArray = count($n);
    if ($lengthArray === 0) {
        return 0;
    }

    $result = 0;
    $countZero = 0;
    $countOne = 0;

    for ($i = 0; $i < $lengthArray; $i++) {
        if ($n[$i] === 1) {
            $countOne++;
        } else {
            $countZero++;
        }
    }

    $tmp = 0;
    $check = 0;

    if ($countZero > $countOne) {
        $check = 1;
        $tmp = $countOne;
    } else {
        $tmp = $countZero;
    }

    $currentCount = 0;

    for ($i = 0; $i < $tmp; $i++) {
        if ($n[$i] === $check) {
            $currentCount++;
        }
    }

    $result = $currentCount;
    $currentCount = 0;

    for ($i = $lengthArray - $tmp; $i < $lengthArray; $i++) {
        if ($n[$i] === $check) {
            $currentCount++;
        }
    }

    $t = - 1;
    if ($check === 1 ) {
        $t = $countOne;
    }else{
        $t = $countZero;
    }
    $result = max($result, $currentCount);
    return $t - $result;

}


$n = [1,1,0,1,0,1,0];

echo GetOptimalContentStorage($n);