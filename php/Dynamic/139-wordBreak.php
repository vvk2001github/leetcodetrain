<?php

// 139. Word Break

// Given a string s and a dictionary of strings wordDict, return true if s can be segmented into a space-separated sequence of one or more dictionary words.

// Note that the same word in the dictionary may be reused multiple times in the segmentation.

class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {

        foreach($wordDict as $word) {
            $pos = strpos($s, $word);
            if($pos === false) return false;

            $s = str_replace($word, '', $s);
        }

        return true;
    }
}

$s = "leetcode"; $wordDict = ["leet","code"];
$s = "applepenapple"; $wordDict = ["apple","pen"];
$s = "catsandog"; $wordDict = ["cats","dog","sand","and","cat"];

$solution = new Solution();

print_r($solution->wordBreak( $s, $wordDict ), false);