<?php

// 583. Delete Operation for Two Strings

// Given two strings word1 and word2, 
// return the minimum number of steps required to make word1 and word2 the same.

// In one step, you can delete exactly one character in either string.

class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        $len1 = strlen($word1);
        $len2 = strlen($word2);
        $dp = array_fill(0, $len1 + 1, []);
        for($i = 0; $i < $len1 + 1; $i++) $dp[$i] = array_fill(0, $len2 + 1, 0);

        for($i = $len1 - 1; $i >= 0; $i--) {
            for($j = $len2 - 1; $j >= 0; $j--) {
                if($word1[$i] == $word2[$j]) {
                    $dp[$i][$j] = 1 + $dp[$i + 1][$j + 1];
                } else {
                    $dp[$i][$j] = max( $dp[$i][$j + 1], $dp[$i + 1][$j] );
                }
            }
        }
        return ($len1 - $dp[0][0]) + ($len2 - $dp[0][0]);
    }
}

$word1 = "sea"; $word2 = "eat";
$word1 = "leetcode"; $word2 = "etco";

$solution = new Solution();

print_r($solution->minDistance( $word1, $word2 ), false);