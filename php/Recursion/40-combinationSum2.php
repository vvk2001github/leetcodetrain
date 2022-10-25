<?php

// 23 / 176 test cases passed. Status: Time Limit Exceeded

// 40. Combination Sum II 

// Given a collection of candidate numbers (candidates) and a target number (target), find all unique combinations in candidates where the candidate numbers sum to target.

// Each number in candidates may only be used once in the combination.

// Note: The solution set must not contain duplicate combinations.

class Solution {

    private int $len = 0;
    private array $result;
    private array $subset;
    private array $candidates;
    private int $target;

    private function dfs(int $i = 0): void {
        if($i >= $this->len) {
            // $tmp = $this->subset;
            // sort($tmp);
            $sum = array_sum($this->subset);
            if($sum == $this->target && !in_array($this->subset, $this->result)) {
                $this->result[] = $this->subset;
            }
            // $this->result[] = $tmp;
            return;
        }

        // include $nums[$i]
        $this->subset[] = $this->candidates[$i];
        $this->dfs($i + 1);

        // NOT include $nums[$i]
        array_pop($this->subset);
        $this->dfs($i + 1);
    }

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target) {
        
        sort($candidates);
        $this->len = count($candidates);
        $this->candidates = $candidates;
        $this->result = [];
        $this->subset = [];
        $this->target = $target;

        $this->dfs();
        return $this->result;

    }
}

$candidates = [10,1,2,7,6,1,5]; $target = 8;

$solution = new Solution();

print_r( $solution->combinationSum2($candidates, $target), false);