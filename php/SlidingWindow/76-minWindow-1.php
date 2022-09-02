<?php

// !!!!!
// 265 / 266 test cases passed.
//

// 76. Minimum Window Substring

// Given two strings s and t of lengths m and n respectively, 
// return the minimum window substring of s such that every character in t (including duplicates) is included in the window. 
// If there is no such substring, return the empty string "".

// The testcases will be generated such that the answer is unique.

// A substring is a contiguous sequence of characters within the string.

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        
        if($s == $t) return $s;

        $len_s = strlen($s);
        $len_t = strlen($t);
        $need = 0;
        $result = '';
        $result_len = PHP_INT_MAX;

        if($len_s < $len_t) return '';

        $hash = []; $window = [];
        for($i = 0; $i < $len_t; $i++) {
            if(isset($hash[$t[$i]])) {
                $hash[$t[$i]]++;
                $need++;
            } else {
                $hash[$t[$i]] = 1;
                $need++;
                $window[$t[$i]] = 0;
            }
        }

        $have = 0;
        $left = 0;

        while(!isset($hash[$s[$left]])) {
            $left++;
            if($i >= $len_s) return '';
        };

        $window[$s[$left]]++;
        $have = 1;
        $right = $left;
        while($left < $len_s && $right < $len_s) {
            while($have < $need) {
                $right++;

                if( isset($hash[$s[$right]]) ) {
                    $window[$s[$right]]++;
                    if($window[$s[$right]] == $hash[$s[$right]]) $have += 1;
                }
            }

            if($have == $need) {
                $newLen = $right - $left + 1;
                if($newLen < $result_len) {
                    $result = substr($s, $left, $newLen);
                    $result_len = $newLen;
                }
            }

            $window[$s[$left]]--;
            $have--;
            $left++;
            if($left >= $len_s) break;
            while(!isset($hash[$s[$left]])) {
                $left++;
                if($left >= $len_s) break;
            }
            if($left >= $len_s) break;
            $window[$s[$left]]++;
            $have++;
            
        }
        return $result;
    }
}

$s = "ADOBECODEBANC"; $t = "ABC";
// $s = "ab"; $t = "a";

$solution = new Solution();

print_r($solution->minWindow( $s, $t ), false);