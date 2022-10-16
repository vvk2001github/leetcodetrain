<?php

// 5. Longest Palindromic Substring

// Given a string s, return the longest palindromic substring in s.

// A string is called a palindrome string if the reverse of that string is the same as the original string.

class Solution {

    private function expandAroundCenter(string $s, int $left, int $right): int {
        $len = strlen($s);
        
        while($left >=0 && $right < $len && $s[$left] == $s[$right]) {
            $left--;
            $right++;
        }

        return $right - $left - 1;
    }

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len = strlen($s);

        if($len == 0) return '';

        $start = 0;
        $end = 0;

        for($i = 0; $i < $len; $i ++) {
            $len1 = $this->expandAroundCenter($s, $i, $i);
            $len2 = $this->expandAroundCenter($s, $i, $i + 1);
            $len3 = max($len1, $len2);
            if($len3 > ($end - $start)) {
                $start = $i - floor(($len3 - 1) / 2);
                $end = $i + floor($len3 / 2);
            }
        }

        return substr($s, $start, $end - $start + 1);
    }
}

// $s = "babad";
$s = "cbbd";

$solution = new Solution();

print_r( $solution->longestPalindrome($s), false);