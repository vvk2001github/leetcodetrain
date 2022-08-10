<?php
// Given two strings s and t, determine if they are isomorphic.

// Two strings s and t are isomorphic if the characters in s can be replaced to get t.

// All occurrences of a character must be replaced with another character while preserving the order of characters. 
// No two characters may map to the same character, but a character may map to itself.

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        $s_len = strlen($s);
        $t_len = strlen($t);
        if($s_len != $t_len) return false;

        $map = [];

        for($i = 0; $i < $s_len; $i++) {
            $x = $s[$i];
            $y = $t[$i];

            if(array_key_exists($x, $map)) {
                if($map[$x] != $y) return false;
            } else {
                if(in_array($y, $map)) {
                    return false;
                };
                $map[$x] = $y;
            }
        }

        return true;
    }
}

$solution = new Solution();

$s = "foo";
$t = "bar";

print_r($solution->isIsomorphic( $s, $t ), false);