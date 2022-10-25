<?php

// 90. Subsets II

// Given an integer array nums that may contain duplicates, return all possible subsets (the power set).

// The solution set must not contain duplicate subsets. Return the solution in any order.

class Solution {

    private int $len = 0;
    private array $result;
    private array $subset;
    private array $nums;

    private function dfs(int $i = 0): void {
        if($i >= $this->len) {
            // $tmp = $this->subset;
            // sort($tmp);
            if(!in_array($this->subset, $this->result)) {
                $this->result[] = $this->subset;
            }
            // $this->result[] = $tmp;
            return;
        }

        // include $nums[$i]
        $this->subset[] = $this->nums[$i];
        $this->dfs($i + 1);

        // NOT include $nums[$i]
        array_pop($this->subset);
        $this->dfs($i + 1);
    }

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        
        sort($nums);
        $this->len = count($nums);
        $this->nums = $nums;
        $this->result = [];
        $this->subset = [];

        $this->dfs();
        return $this->result;

    }
}

$nums = [4, 1, 0];

$solution = new Solution();

print_r( $solution->subsetsWithDup($nums), false);