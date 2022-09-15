<?php

// 77. Combinations

// Given two integers n and k, return all possible combinations of k numbers chosen from the range [1, n].

// You may return the answer in any order.

class Solution {

    private function foo(array &$arr, int $n, int $k): bool {
        $m = $k;
        for($i = $m - 1; $i>=0; $i--) {
            if($arr[$i] < $n - $m + $i + 1) {
                $arr[$i]++;
                for($j  = $i + 1; $j < $m; $j++) {
                    $arr[$j] = $arr[$j - 1] + 1;
                }
                return true;
            }
        }

        return false;
    }

    /**
     * @param int $n
     * @param int $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $arr = [];
        $result = [];

        for($i = 0; $i < $n; $i++ ) {
            $arr[] = $i + 1;
        }

        $result[] = array_slice($arr, 0, $k);

        while($this->foo($arr, $n, $k)) {
            $result[] = array_slice($arr, 0, $k);
        }

        return $result;
    }
}

$n = 4; $k = 2;

$solution = new Solution();

print_r($solution->combine( $n, $k ), false);