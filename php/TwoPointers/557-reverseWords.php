<?php

// 557. Reverse Words in a String III

// Given a string s, 
// reverse the order of characters in each word within a sentence while still preserving whitespace and initial word order.

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $arr = explode(' ', $s);
        $count = count($arr);

        for($i = 0; $i < $count; $i++) {
            $arr[$i] = strrev($arr[$i]);
        }

        return implode(' ', $arr);
    }
 }

$s = "Let's take LeetCode contest";

$solution = new Solution();

print_r( $solution->reverseWords($s), false);