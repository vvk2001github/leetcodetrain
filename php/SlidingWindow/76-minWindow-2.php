<?php


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
        
        if ($t == "") return "";

        $countT = [];
        $window = [];
        $have = 0;
        $len_t = strlen($t);
        $len_s = strlen($s);
        $result = [-1, -1];
        $resultLen = PHP_INT_MAX;
        $left = 0;

        if($len_s < $len_t) return '';

        for($i = 0; $i < $len_t; $i++) {
            if(isset($countT[$t[$i]])) {
                $countT[$t[$i]]++;
            } else {
                $countT[$t[$i]] = 1;
            }
        }

        $need = count($countT);

        for($r = 0; $r < $len_s; $r++) {
            
            $c = $s[$r];
            if(isset($window[$c])) {
                $window[$c]++;
            } else {
                $window[$c] = 1;
            }

            if(array_key_exists($c, $countT) && ($window[$c] == $countT[$c])) {
                $have++;
            }

            while($have == $need) {
                if(($r - $left + 1) < $resultLen) {
                    $result = [$left, $r];
                    $resultLen = $r - $left +1;
                }
                $window[$s[$left]] -= 1;

                if(array_key_exists($s[$left], $countT) && ($window[$s[$left]] < $countT[$s[$left]])) {
                    $have--;
                }

                $left++;
            }
        }
        $left = $result[0];
        $right = $result[1];
        if($resultLen != PHP_INT_MAX) {
            return substr($s, $left, $right - $left + 1);
        } else {
            return "";
        }
    }
}

// $s = "ADOBECODEBANC"; $t = "ABC";
$s = "a"; $t = "b";

$solution = new Solution();

print_r($solution->minWindow( $s, $t ), false);