<?php
// Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

// A subsequence of a string is a new string 
// that is formed from the original string 
// by deleting some (can be none) of the characters 
// without disturbing the relative positions of the remaining characters. 
// (i.e., "ace" is a subsequence of "abcde" while "aec" is not).

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $offset = 0;
        for($i = 0; $i < strlen($s); $i++ ) {
            $tmp = strpos($t, $s[$i], $offset);
            if($tmp === false) return false;
            //if($tmp == $offset) return false;
            $offset = $tmp + 1;
        }
        return true;
    }
}

$solution = new Solution();

$s = "abc";
$t = "ahbgdc";
//$s = "aaaaaa";
//$t = "bbaaaa";


print_r($solution->isSubsequence( $s, $t ), false);
