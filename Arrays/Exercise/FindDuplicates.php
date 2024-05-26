<?php

class FindDuplicates {

    public function findDuplicates(array $arr): array
    {
        $n = count($arr);

        $arrayDuplicates = [];

        for ($i = 0; $i < $n; $i++) {

            $isDuplicate = false;

            for ($j = 0; $j < count($arrayDuplicates); $j++) {
                if ($arr[$i] === $arr[$j]) {
                    $isDuplicate = true;
                    break;
                }
            }

            if ($isDuplicate) {
               continue;
            }

            for ($j = $i + 1; $j < $n; $j++) {
                if ($arr[$i] === $arr[$j]) {
                    $arrayDuplicates[] = $arr[$i];
                    break;
                }
            }

        }
        return $arrayDuplicates;
    }

}

$arr = [1, 2, 3, 4, 3, 2, 1];
$findDuplicates = new FindDuplicates();
print_r($findDuplicates->findDuplicates($arr));
