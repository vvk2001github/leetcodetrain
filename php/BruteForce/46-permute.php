<?php

// 46. Permutations

// Given an array nums of distinct integers, 
// return all the possible permutations. 
// You can return the answer in any order.

class Solution {

    private int $countNums;

    private function swap(array &$arr, int $i, int $j): void {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
    }

    private function nextSet(array &$a): bool {

        $j = $this->countNums - 2;

        while ($j != -1 && $a[$j] >= $a[$j + 1]) $j--;

        if ($j == -1) return false;

        $k = $this->countNums - 1;
        while ($a[$j] >= $a[$k]) $k--;
        $this->swap($a, $j, $k);
        $l = $j + 1;
        $r = $this->countNums - 1;
        while ($l < $r) $this->swap($a, $l++, $r--);

        return true;
    }

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $this->countNums = count($nums);

        if($this->countNums == 1) return [$nums];
        if($this->countNums == 2) return [ [$nums[0], $nums[1]], [$nums[1], $nums[0]] ];

        sort($nums);

        $result = [];
        $result = [$nums];
        while ($this->nextSet($nums)) $result[] = $nums;

        return $result;

    }
}

// $nums = [1,2,3];
// $nums = [0,1];
// $nums = [1];
$nums = [0, 2, 4];

$solution = new Solution();

print_r($solution->permute( $nums ), false);
