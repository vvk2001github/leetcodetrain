<?php

// 567. Permutation in String

// Given two strings s1 and s2, return true if s2 contains a permutation of s1, or false otherwise.

// In other words, return true if one of s1's permutations is the substring of s2.

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2) {
        $len_s1 = strlen($s1);
        $len_s2 = strlen($s2);
        $diff_len = $len_s2 - $len_s1;
        $cache = [];
        for($i = 0; $i < $len_s1; $i++) {
            if(array_key_exists($s1[$i], $cache)){
                $cache[$s1[$i]]++;
            } else {
                $cache[$s1[$i]] = 1;
            }
            
        }

        $i = 0;
        while($i <= $diff_len) {
            while($i < $diff_len && !array_key_exists($s2[$i], $cache)) $i++;
            if($i > $diff_len ) return false;
            
            $tmp_cache = $cache;
            for($j = $i; $j < $i + $len_s1; $j++){
                if(array_key_exists($s2[$j], $cache)) {
                    $tmp_cache[$s2[$j]]--;
                } else {
                    $i = $j;
                    break;
                }
            }

            $allZero = true;
            foreach($tmp_cache as $tmp) {
                if($tmp <> 0) {
                    $allZero = false;
                    break;
                }
            }
            if($allZero) return true;
            $i++;
        }

        return false;
    }
}

// $s1 = "ab"; $s2 = "eidbaooo";
$s1 = "adc"; $s2 = "dcda";

$solution = new Solution();

print_r( $solution->checkInclusion($s1, $s2), false);