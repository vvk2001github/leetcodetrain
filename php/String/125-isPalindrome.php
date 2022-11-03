<?php

// 125. Valid Palindrome

// A phrase is a palindrome if, 
// after converting all uppercase letters into lowercase letters 
// and removing all non-alphanumeric characters, 
// it reads the same forward and backward. 
// Alphanumeric characters include letters and numbers.

// Given a string s, return true if it is a palindrome, or false otherwise.

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {

        // $s = preg_replace( '/[\W]/', '', strtolower($s));
        $s = preg_replace( '/[^a-z0-9]/i', '', strtolower($s));

        $len = strlen($s);

        for($i = 0; $i < floor($len / 2); $i++) {
            if($s[$i] != $s[$len - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}

$s = "A man, a plan, a canal: Panama";
// $s = "race a car";
// $s = " ";
// $s = "ab_a";

$solution = new Solution();

print_r($solution->isPalindrome( $s ), false);