<?php

// 290. Word Pattern

// Given a pattern and a string s, 
// find if s follows the same pattern.

// Here follow means a full match, 
// such that there is a bijection between a letter in pattern and a non-empty word in s.

class Solution {

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    function wordPattern($pattern, $s) {
        $len_pattern = strlen($pattern);
        $array_s = explode(' ', $s);
        $count_s = count($array_s);

        $cache = [];

        if($len_pattern != $count_s) return false;

        for($i = 0; $i < $count_s; $i++) {
            if(array_key_exists($pattern[$i], $cache)) {
                if($cache[$pattern[$i]] !== $array_s[$i]) return false;
            } else {
                if(in_array($array_s[$i], $cache)) return false;
                $cache[$pattern[$i]] = $array_s[$i];
            }
        }

        return true;
    }
}

// $pattern = "abba"; $s = "dog cat cat dog";
// $pattern = "abba"; $s = "dog cat cat fish";
$pattern = "abba"; $s = "dog dog dog dog";


$solution = new Solution();

print_r( $solution->wordPattern($pattern, $s), false);