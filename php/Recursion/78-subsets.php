<?php

// 78. Subsets

// Given an integer array nums of unique elements, return all possible subsets (the power set).

// The solution set must not contain duplicate subsets. Return the solution in any order.

class Solution {

    private int $len = 0;
    private array $result;
    private array $subset;
    private array $nums;

    private function dfs(int $i = 0): void {
        if($i >= $this->len) {
            $this->result[] = $this->subset;
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
    function subsets($nums) {

        $this->len = count($nums);
        $this->nums = $nums;
        $this->result = [];
        $this->subset = [];

        $this->dfs();
        return $this->result;
    }
}

$nums = [1,2,3];

$solution = new Solution();

print_r( $solution->subsets($nums), false);