<?php

// 345. Reverse Vowels of a String

// Given a string s, reverse only all the vowels in the string and return it.

// The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once.

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseVowels($s) {
        $lenS = strlen($s);
        $arr = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $stack = new SplStack();
        $result ='';

        for($i = 0; $i < $lenS; $i++) {
            if(in_array($s[$i], $arr)) {
                $stack->push($s[$i]);
            }
        }

        for($i = 0; $i < $lenS; $i++) {
            if(in_array($s[$i], $arr)) {
                $result .= $stack->pop();
            } else {
                $result .= $s[$i];
            }
        }

        return $result;
    }
}

// $s = "hello";
$s = "leetcode";

$solution = new Solution();

print_r( $solution->reverseVowels($s), false);