<?php

// !!!!!
// 42 / 44 test cases passed. Time Limit Exceeded
// !!!!!

// 120. Triangle

// Given a triangle array, 
// return the minimum path sum from top to bottom.

// For each step, you may move to an adjacent number of the row below. 
// More formally, if you are on index i on the current row, 
// you may move to either index i or index i + 1 on the next row.

class Solution {

    private array $triangle;
    private int $levelsCount;

    private function foo(int $level, int $index): int {
        if($level == $this->levelsCount - 1) return $this->triangle[$level][$index];

        return $this->triangle[$level][$index] + min($this->foo($level + 1, $index), $this->foo($level + 1, $index + 1));
    }

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        $this->triangle = $triangle;
        $this->levelsCount = count($triangle);

        return $this->foo(0, 0);
    }
}
// $triangle = [[2],[3,4],[6,5,7],[4,1,8,3]];
$triangle = [[-10]];

$solution = new Solution();

print_r($solution->minimumTotal( $triangle ), false);