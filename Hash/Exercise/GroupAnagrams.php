<?php

    function solution($strArray): array
    {
        $result = [];

        foreach($strArray as $str) {
            $characters = str_split($str);

            sort($characters);

            $sorted_str = implode('', $characters);

            if(!isset($result[$sorted_str])) {
                $result[$sorted_str] = [];
            }

            $result[$sorted_str][] = $str;
        }

        return array_values($result);
    }

    $strArray = ["eat", "tea", "tan", "ate", "nat", "bat"];

    echo "\n";
    echo "Solution hashmap";
    echo "\n";
    var_dump(solution($strArray));