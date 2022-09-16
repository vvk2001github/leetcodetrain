<?php

// 387. First Unique Character in a String

// Given a string s, find the first non-repeating character in it and return its index. 
// If it does not exist, return -1.

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        $len = strlen($s);
        $cache =[];
        for($i = 0; $i < $len; $i++){
            if(strpos($s, $s[$i], $i + 1) === false && !array_key_exists($s[$i], $cache)) return $i;
            $cache[$s[$i]] = true;
        }

        return -1;
    }
}

// $s = "loveleetcode";
$s = 'aabb';

$solution = new Solution();

print_r($solution->firstUniqChar( $s ), false);