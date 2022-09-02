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

        if($len_s < $len_t) return '';

        $hash = [];
        for($i = 0; $i < $len_t; $i++) {
            if(isset($hash[$t[$i]])) {
                $hash[$t[$i]]++;
            } else {
                $hash[$t[$i]] = 1;
            }
        }

        $left = 0;
        $right = 0;
        $found = [];
        $need = $hash;
        //
        $i = 0;
        while(!isset($hash[$s[$i]])) {
            $i++;
            if($i >= $len_s) return '';
        };

        $left = $i;
        $right = $left + 1;
        $need[$s[$left]]--;
        if($need[$s[$left]] <= 0) unset($need[$s[$left]]);

        while($left < $len_s) {
            $right = $left + 1;
            $countNeed = count($need);
            while($countNeed > 0 && $right < $len_s) {
                if(isset($need[$s[$right]])) {
                    $need[$s[$right]]--;
                    if($need[$s[$right]] == 0) {
                        unset($need[$s[$right]]);
                        $countNeed = count($need);
                    }
                }
                
                $right++;
            }

            if($countNeed <= 0) {
                $found[] = substr($s, $left, $right - $left);
            };

            $need = $hash;
            $left++;
            if($left >= $len_s) break;
            while(!isset($hash[$s[$left]])) {
                $left++;
                if($left >= $len_s) break;
            }
            if($left >= $len_s) break;
            $need[$s[$left]]--;
            if($need[$s[$left]] <= 0) unset($need[$s[$left]]);

        }

        $min_index = -1;
        $min = PHP_INT_MAX;
        foreach($found as $key => $value) {
            if(strlen($found[$key]) < $min) {
                $min = strlen($found[$key]);
                $min_index = $key;
            }
        }

        if(!isset($found[$min_index])) return "";
        return $found[$min_index];
    }
}

// $s = "ADOBECODEBANC"; $t = "ABC";
$s = "ab"; $t = "a";

$solution = new Solution();

print_r($solution->minWindow( $s, $t ), false);