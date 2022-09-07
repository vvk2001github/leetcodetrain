<?php

// 39. Combination Sum

// Given an array of distinct integers candidates and a target integer target, 
// return a list of all unique combinations of candidates where the chosen numbers sum to target. 
// You may return the combinations in any order.

// The same number may be chosen from candidates an unlimited number of times. 
// Two combinations are unique if the frequency of at least one of the chosen numbers is different.

// It is guaranteed that the number of unique combinations 
// that sum up to target is less than 150 combinations for the given input.

class Solution {

    private array $result;
    private int $target;
    private int $countCandidates;
    private array $candidates;

    private function foo(int $i, array $current, int $total): void {
        if ($this->target == $total) {
            array_push($this->result, $current);
            return;
        }

        if ($i >= $this->countCandidates || $total > $this->target) {
            return;
        }

        array_push($current, $this->candidates[$i]);
        $this->foo($i, $current, $total + $this->candidates[$i]);
        array_pop($current);
        $this->foo($i + 1, $current, $total);

    }
    
    /**
     * @param Integer[] $candidates
     * @param int $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $this->result = [];
        $this->target = $target;
        $this->candidates = $candidates;
        $this->countCandidates = count($candidates);

        $this->foo(0, [], 0);

        return $this->result;
    }
}

$candidates = [2,3,6,7]; $target = 7;
// $candidates = [2,3,5]; $target = 8;
// $candidates = [2]; $target = 1;

$solution = new Solution();

print_r($solution->combinationSum( $candidates, $target ), false);