<?php

// 438

// Given two strings s and p, 
// return an array of all the start indices of p's anagrams in s. 
// You may return the answer in any order.

// An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
// typically using all the original letters exactly once.

class Solution {

    public function isValid(array $freq):bool {
        for($i = 0; $i <26; $i++){
            if($freq[$i] != 0) return false;
        }
        return true;
    }

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
        $a = ord('a');

        
        $result = [];
        $freq = array_fill(0, 26, 0);
        
        for($i =0; $i < $len_p; $i++) {
            $freq[ord($p[$i]) - $a]++;
            $freq[ord($s[$i]) - $a]--;
        }

        if($this->isValid($freq))  $result[] = 0;

        for($i=$len_p; $i<$len_s; $i++) {
            $index1 = ord($s[$i - $len_p]) - $a;
            $char1 = $s[$i - $len_p];
            $freq[$index1]++;
            $index2 = ord($s[$i]) - $a;
            $char2 = $s[$i];
            $freq[$index2]--;
            if($this->isValid($freq)) $result[] = $i - $len_p + 1;
        }


        return $result;
    }
}

$s = "cbaebabacd";
$p = "abc";

$solution = new Solution();

print_r( $solution->findAnagrams($s, $p), false);
