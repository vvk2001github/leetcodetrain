<?php

// 40. Combination Sum II 

// Given a collection of candidate numbers (candidates) and a target number (target), find all unique combinations in candidates where the candidate numbers sum to target.

// Each number in candidates may only be used once in the combination.

// Note: The solution set must not contain duplicate combinations.

class Solution {

    private int $len = 0;
    private array $result;
    private array $candidates;

    private function backtrack(array $cur = [], int $pos = 0, int $target): void {
        if($target == 0) {
            $this->result[] = $cur;
        }

        if($target <= 0) {
            return;
        }

        $prev = -1;

        for($i = $pos; $i < $this->len; $i++) {
            if($this->candidates[$i] == $prev) {
                continue;
            }
            $cur[] = $this->candidates[$i];
            $this->backtrack($cur, $i + 1, $target - $this->candidates[$i]);
            array_pop($cur);
            $prev = $this->candidates[$i];
        }
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

        $this->backtrack(cur: [], pos: 0, target: $target);
        return $this->result;

    }
}

$candidates = [10,1,2,7,6,1,5]; $target = 8;

$solution = new Solution();

print_r( $solution->combinationSum2($candidates, $target), false);