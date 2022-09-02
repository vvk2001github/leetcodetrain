<?php

// 3. Longest Substring Without Repeating Characters

// Given a string s, find the length of the longest substring without repeating characters.

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $tmp = '';

        $result = 0;

        $len = strlen($s);

        for($i = 0; $i < $len; $i++) {
            $pos = strpos($tmp, $s[$i]);
            if($pos !== false) {
                $tmp = substr($tmp, $pos + 1);
            }
            $tmp .= $s[$i];
            $result = max($result, strlen($tmp));
        }

        return $result;
    }
}

$s = "abcabcbb";

$solution = new Solution();

print_r($solution->lengthOfLongestSubstring( $s ), false);