<?php

// 22. Generate Parenthese

// Given n pairs of parentheses, 
// write a function to generate all combinations of well-formed parentheses.

class Solution {

    private array $stack;
    private array $res;
    private int $n;

    private function backtrack(int $openN = 0, int $closedN = 0): void {
        if($openN == $closedN && $openN == $this->n ) {
            $this->res[] = implode('', $this->stack);
            return;
        }

        if ($openN < $this->n) {
            $this->stack[] = '(';
            $this->backtrack($openN + 1, $closedN);
            array_pop($this->stack);
        }

        if($closedN < $openN) {
            $this->stack[] = ')';
            $this->backtrack($openN, $closedN + 1);
            array_pop($this->stack);
        }
    }

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $this->stack = [];
        $this->res = [];
        $this->n = $n;

        $this->backtrack();

        return $this->res;
    }
}

$n = 3;

$solution = new Solution();

print_r($solution->generateParenthesis( $n ), false);
