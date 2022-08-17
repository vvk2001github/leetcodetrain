<?php

// 438

// Given two strings s and p, 
// return an array of all the start indices of p's anagrams in s. 
// You may return the answer in any order.

// An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
// typically using all the original letters exactly once.

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p) {
        $len_s = strlen($s);
        $len_p = strlen($p);
        $len_s_p = $len_s - $len_p;

        if ($len_s < $len_p) return [];

        $p_arr = [];
        for($i = 0; $i < $len_p; $i++) {
            if(array_key_exists($p[$i], $p_arr)) {
                $p_arr[$p[$i]]++;
            } else {
                $p_arr[$p[$i]] = 1;
            }
        }

        $result = [];

        for($i = 0; $i <= $len_s_p; $i++) {
            $substr = substr($s, $i, $len_p);
            $tmp = [];
            for($j =0; $j < $len_p; $j++) {
                if(!array_key_exists($substr[$j], $p_arr)) break;

                if(array_key_exists($substr[$j], $tmp)) {
                    $tmp[$substr[$j]]++;
                } else {
                    $tmp[$substr[$j]] = 1;
                }

                if($tmp[$substr[$j]] > $p_arr[$substr[$j]]) break;
            }

            $diff = array_diff_assoc($p_arr, $tmp);
            //print_r($diff, false);
            if($diff === []) $result[] = $i;
        }

        return $result;
    }
}

$s = "abab";
$p = "ab";

$solution = new Solution();

print_r( $solution->findAnagrams($s, $p), false);
