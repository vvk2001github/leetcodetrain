<?php

// 58. Length of Last Word

// Given a string s consisting of words and spaces, return the length of the last word in the string.

// A word is a maximal substring consisting of non-space characters only.

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        return strlen(explode(' ', trim($s))[count(explode(' ', trim($s))) - 1]);
    }
}

$s = "   fly me   to   the moon  ";

$solution = new Solution();

print_r($solution->lengthOfLastWord( $s ), false);