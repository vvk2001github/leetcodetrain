<?php

// 343. Integer Break

// Given an integer n, 
// break it into the sum of k positive integers, 
// where k >= 2, and maximize the product of those integers.

// Return the maximum product you can get.

class Solution {

    private int $n;
    private array $dp = [1 => 1];

    private function dfs(int $num = 1): int {
        if(array_key_exists($num, $this->dp)) {
            return $this->dp[$num];
        }

        if($this->n == $num) {
            $this->dp[$num] = 0;
        } else {
            $this->dp[$num] = $num;
        }

        for($i = 1; $i < $num; $i++) {
            $val = $this->dfs($i) * $this->dfs($num - $i);
            $this->dp[$num] = max($this->dp[$num], $val);
        }

        return $this->dp[$num];
    }

    /**
     * @param int $n
     * @return Integer
     */
    function integerBreak($n) {

        $this->n = $n;

        return $this->dfs($n);
    }
}

$n = 4;

$solution = new Solution();

print_r($solution->integerBreak( $n ), false);