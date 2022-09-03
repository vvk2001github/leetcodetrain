<?php

// 46. Permutations

// Given an array nums of distinct integers, 
// return all the possible permutations. 
// You can return the answer in any order.

class Solution {

    private function swap(array &$arr, int $i, int $j): void {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }

    private function nextSet(array &$a, int $n): bool {

        $j = $n - 2;

        while ($j != -1 && $a[$j] >= $a[$j + 1]) $j--;

        if ($j == -1) return false;

        $k = $n - 1;
        while ($a[$j] >= $a[$k]) $k--;
        $this->swap($a, $j, $k);
        $l = $j + 1;
        $r = $n - 1;
        while ($l < $r) $this->swap($a, $l++, $r--);

        return true;
    }

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $countNums = count($nums);

        if($countNums == 1) return [$nums];
        if($countNums == 2) return [ [$nums[0], $nums[1]], [$nums[1], $nums[0]] ];

        sort($nums);

        $result = [];
        $result = [$nums];
        while ($this->nextSet($nums, $countNums)) $result[] = $nums;

        return $result;

    }
}

$nums = [1,2,3];
// $nums = [0,1];
// $nums = [1];

$solution = new Solution();

print_r($solution->permute( $nums ), false);
