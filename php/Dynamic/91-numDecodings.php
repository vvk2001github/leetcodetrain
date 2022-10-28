<?php

// 91. Decode Ways

// A message containing letters from A-Z can be encoded into numbers using the following mapping:

// 'A' -> "1"
// 'B' -> "2"
// ...
// 'Z' -> "26"

// To decode an encoded message, all the digits must be grouped then mapped 
// back into letters using the reverse of the mapping above (there may be multiple ways). For example, "11106" can be mapped into:

//     "AAJF" with the grouping (1 1 10 6)
//     "KJF" with the grouping (11 10 6)

// Note that the grouping (1 11 06) is invalid because "06" cannot be mapped into 'F' since "6" is different from "06".

// Given a string s containing only digits, return the number of ways to decode it.

// The test cases are generated so that the answer fits in a 32-bit integer.

class Solution {

    private array $dp;
    private int $len;

    private function dfs(int $i): int {
        if(array_key_exists($i, $this->dp)) {
            return $this->dp[$i];
        }
    }

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        $this->len = strlen($s);
        $this->dp[$this->len] = 1;
    }
}

$s = "226";

$solution = new Solution();

print_r($solution->numDecodings( $s ), false);