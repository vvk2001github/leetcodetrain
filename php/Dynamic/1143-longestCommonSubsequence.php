<?php

// 1143. Longest Common Subsequence

// Given two strings text1 and text2, return the length of their longest common subsequence. If there is no common subsequence, return 0.

// A subsequence of a string is a new string generated from the original string with some characters (can be none) deleted without changing the relative order of the remaining characters.

//     For example, "ace" is a subsequence of "abcde".

// A common subsequence of two strings is a subsequence that is common to both strings.

class Solution {

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2) {
        $len1 = strlen($text1);
        $len2 = strlen($text2);
        $dp = array_fill(0, $len1 + 1, []);
        for($i = 0; $i < $len1 + 1; $i++) $dp[$i] = array_fill(0, $len2 + 1, 0);

        for($i = $len1 - 1; $i >= 0; $i--) {
            for($j = $len2 - 1; $j >= 0; $j--) {
                if($text1[$i] == $text2[$j]) {
                    $dp[$i][$j] = 1 + $dp[$i + 1][$j + 1];
                } else {
                    $dp[$i][$j] = max( $dp[$i][$j + 1], $dp[$i + 1][$j] );
                }
            }
        }
        return $dp[0][0];
    }
}

// $text1 = "abcde"; $text2 = "ace";

$text1 = "sea"; $text2 = "eat";

$solution = new Solution();

print_r($solution->longestCommonSubsequence( $text1, $text2 ), false);