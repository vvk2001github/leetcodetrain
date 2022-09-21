<?php

// 242. Valid Anagram

// Given two strings s and t, return true if t is an anagram of s, and false otherwise.

// An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
// typically using all the original letters exactly once.

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        $len_s = strlen($s);
        $len_t = strlen($t);
        if($len_s != $len_t) return false;

        $cache = [];
        for($i = 0; $i < $len_s; $i++) {
            if(array_key_exists($s[$i], $cache)) {
                $cache[$s[$i]]++;
            } else {
                $cache[$s[$i]] = 1;
            }
        }

        for($i = 0; $i < $len_s; $i++) {
            if(array_key_exists($t[$i], $cache)) {
                $cache[$t[$i]]--;
                if($cache[$t[$i]] < 0) return false;
            } else {
                return false;
            }
        }

        foreach($cache as $tmp) {
            if($tmp > 0) return false;
        }

        return true;
    }
}

// $s = "anagram"; $t = "nagaram";
$s = "rat"; $t = "car";

$solution = new Solution();

print_r($solution->isAnagram( $s, $t ), false);