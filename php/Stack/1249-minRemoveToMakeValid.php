<?php

// 1249. Minimum Remove to Make Valid Parentheses

// Given a string s of '(' , ')' and lowercase English characters.

// Your task is to remove the minimum number of parentheses ( '(' or ')', 
// in any positions ) so that the resulting parentheses string is valid and return any valid string.

// Formally, a parentheses string is valid if and only if:

//     It is the empty string, contains only lowercase characters, or
//     It can be written as AB (A concatenated with B), where A and B are valid strings, or
//     It can be written as (A), where A is a valid string.

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid($s) {
        $len = strlen($s);

        $stack = new SplStack();


        for($i = 0; $i < $len; $i++) {
            if( $s[$i] == '(' ) {
                $stack->push($i);
            } elseif ( $s[$i] == ')' ) {
                
                if($stack->isEmpty()) {
                    $s[$i] = '#';
                } else {
                    $stack->pop();
                }
            }
        }

        while(!$stack->isEmpty()) {
            $s[$stack->pop()] = '#';
        }

        return str_replace('#', '', $s);
    }
}

$s = "lee(t(c)o)de)";

$solution = new Solution();

print_r($solution->minRemoveToMakeValid( $s ), false);