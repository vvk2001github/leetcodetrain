<?php

// 383. Ransom Note

// Given two strings ransomNote and magazine, return true if ransomNote can be constructed by using the letters from magazine and false otherwise.

// Each letter in magazine can only be used once in ransomNote.

class Solution {

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $lenMagazine = strlen($magazine);
        $lenRansom = strlen($ransomNote);
        $cache = [];

        for($i = 0; $i < $lenMagazine; $i++) {
            if(isset($cache[$magazine[$i]])) {
                $cache[$magazine[$i]]++;
            } else {
                $cache[$magazine[$i]] = 1;
            }
        }

        for($i = 0; $i < $lenRansom; $i++) {
            if(isset($cache[$ransomNote[$i]])) {
                $cache[$ransomNote[$i]]--;

                if($cache[$ransomNote[$i]] < 0) return false;

            } else {
                return false;
            }
        }

        return true;
    }
}

$ransomNote = "aa"; $magazine = "aab";

$solution = new Solution();

print_r($solution->canConstruct( $ransomNote, $magazine ), false);