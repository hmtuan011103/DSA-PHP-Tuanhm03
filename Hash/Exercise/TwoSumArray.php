<?php


    //    Hashmap
    //    Hashmap trong PHP (associative array) được sử dụng để lưu trữ các cặp key-value. Trong bài toán "Two Sum", hashmap được sử dụng để lưu trữ giá trị của phần tử trong mảng là key và chỉ số của nó là value.
    //
    //    Khi duyệt qua mảng, chúng ta tính toán phần bù (complement) của giá trị hiện tại và kiểm tra xem phần bù đó đã tồn tại trong hashmap chưa. Nếu tồn tại, chúng ta có thể trả về chỉ số của phần bù và chỉ số hiện tại. Nếu không, chúng ta thêm giá trị hiện tại vào hashmap với chỉ số của nó.
    function solution1($nums, $target): array
    {
        $n = count($nums); // get length

        if ($n < 2) {
            return [];
        }

        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($nums[$i] + $nums[$j] === $target) {
                    return [$i, $j];
                }
            }
        }

        return [];
    }


    //Hashset
    //Hashset trong PHP được mô phỏng bằng cách sử dụng associative array với giá trị boolean. Mục đích của hashset là chỉ lưu trữ các giá trị mà không quan tâm đến các chỉ số. Trong bài toán "Two Sum", hashset có thể lưu trữ các giá trị đã duyệt qua, và kiểm tra xem phần bù có tồn tại trong hashset hay không.
    //
    //Tuy nhiên, để tìm ra chỉ số của phần bù, chúng ta cần sử dụng array_search để tìm chỉ số của giá trị trong mảng gốc, vì hashset chỉ lưu trữ giá trị, không lưu trữ chỉ số.
    function solution2($nums, $target): array
    {
        $n = count($nums);

        $hashmap = [];
        for ($i = 0; $i < $n; $i++) {
            $complement = $target - $nums[$i];
            if (isset($hashmap[$complement])) {
                return [
                    $hashmap[$complement],
                    $i
                ];
            }
            $hashmap[$nums[$i]] = $i;
        }
        return [];
    }

    //    Hashmap: Dễ dàng và chính xác hơn trong việc tìm chỉ số của phần bù vì nó lưu cặp giá trị-chỉ số.

    //    Hashset: Phải tìm chỉ số của phần bù bằng array_search, có thể dẫn đến việc kết quả không chính xác nếu có các giá trị trùng lặp trong mảng.

    function solution3($nums, $target): array
    {
        $n = count($nums);

        $hashset = [];

        for ($i = 0; $i < $n; $i++) {
            $complement = $target - $nums[$i];
            if (isset($hashset[$complement])) {
                $complementIndex = array_search($complement, $nums);
                return [
                    $complementIndex,
                    $i
                ];
            }
            $hashset[$nums[$i]] = true;
        }

        return [];
    }

    function solution4($nums, $target): array
    {
        $n = count($nums);

        $left = 0;
        $right = $n - 1;

        while ($left < $right)
        {
            $sum = $nums[$left] + $nums[$right];
            if ($sum === $target) {
                return [$left, $right];
            } elseif  ($sum > $target) {
                $right--;
            } else {
                $left++;
            }
        }

        return [];

    }


    $nums = [2, 7, 11, 15];
    $target = 9;
    echo "Solution array";
    print_r(solution1($nums, $target));
    echo "\n";
    echo "Solution hashmap";
    print_r(solution2($nums, $target));

    echo "\n";
    echo "Solution hashset";
    print_r(solution3($nums, $target));

    echo "\n";
    echo "Two pointer";
    print_r(solution4($nums, $target));