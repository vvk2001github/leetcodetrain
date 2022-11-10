<?php

// 1047. Remove All Adjacent Duplicates In String

// You are given a string s consisting of lowercase English letters. 
// A duplicate removal consists of choosing two adjacent and equal letters and removing them.

// We repeatedly make duplicate removals on s until we no longer can.

// Return the final string after all such duplicate removals have been made. 
// It can be proven that the answer is unique.

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeDuplicates($s) {
        $lenS = strlen($s);
        $stack = [];

        for($i = 0; $i < $lenS; $i++) {
            if(count($stack) > 0 && end($stack) == $s[$i]) {
                array_pop($stack);
            } else {
                $stack[] = $s[$i];
            }
        }

        return implode('', $stack);
    }
}

// $s = "abbaca";
$s = "azxxzy";

$solution = new Solution();

print_r( $solution->removeDuplicates($s), false);