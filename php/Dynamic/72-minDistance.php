<?php

// 72. Edit Distance

// Given two strings word1 and word2, 
// return the minimum number of operations required to convert word1 to word2.

// You have the following three operations permitted on a word:

//     Insert a character
//     Delete a character
//     Replace a character



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
        for($i = 0; $i <= $len1; $i++) {
            $dp[$i] = array_fill(0, $len2, PHP_INT_MAX);
            $dp[$i][$len2] = $len1 - $i;
        }

        for($i = 0; $i <= $len2; $i++) {
            $dp[$len1][$i] = $len2 - $i;
        }

        for($i = $len1 - 1; $i >= 0; $i--) {
            for($j = $len2 - 1; $j >= 0; $j--) {
                if($word1[$i] == $word2[$j]) {
                    $dp[$i][$j] = $dp[$i + 1][$j + 1];
                } else {
                    $dp[$i][$j] = 1 + min($dp[$i + 1][$j], $dp[$i][$j + 1], $dp[$i + 1][$j + 1]);
                }
            }
        }

        return $dp[0][0];
    }
}

// $word1 = "sea"; $word2 = "eat";
$word1 = "horse"; $word2 = "ros";

$solution = new Solution();

print_r($solution->minDistance( $word1, $word2 ), false);