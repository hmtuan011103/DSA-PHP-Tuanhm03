<?php

function GetOptimalContentStorage(array $n): int
{
    $lengthArray = count($n);
    if ($lengthArray === 0) {
        return 0;
    }

    $countZero = 0;
    $countOne = 0;

    for ($i = 0; $i < $lengthArray; $i++) {
        if ($n[$i] === 1) {
            $countOne++;
        } else {
            $countZero++;
        }
    }

    $minorityElement = ($countZero > $countOne) ? 1 : 0;
    $minorityCount = min($countZero, $countOne);
    $frontCount = 0;
    $endCount = 0;

    for ($i = 0; $i < $minorityCount; $i++) {
        if ($n[$i] == $minorityElement) {
            $frontCount++;
        }
        if ($n[$lengthArray - 1 - $i] == $minorityElement) {
            $endCount++;
        }
    }

    $maxMinorityInEnds = max($frontCount, $endCount);

    return $minorityCount - $maxMinorityInEnds;

}

$n = [1,0,0,1,1,0,0,0,1];

echo GetOptimalContentStorage($n);