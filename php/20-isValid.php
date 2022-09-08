<?php

// 20. Valid Parentheses

// Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

// An input string is valid if:

//     Open brackets must be closed by the same type of brackets.
//     Open brackets must be closed in the correct order.
//     Every close bracket has a corresponding open bracket of the same type.

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $len = strlen($s);
        $stack = [];
        $stackSize = 0;

        for($i = 0; $i < $len; $i++) {
            if($s[$i] == "(" || $s[$i] == "{" || $s[$i] == "[") {
                array_push($stack, $s[$i]);
                $stackSize++;
                continue;
            }

            if($s[$i] == ")") {
                if($stack[$stackSize - 1] != "(") {
                    return false;
                } else {
                    array_pop($stack);
                    $stackSize--;
                    continue;
                }
            }

            if($s[$i] == "]") {
                if($stack[$stackSize - 1] != "[") {
                    return false;
                } else {
                    array_pop($stack);
                    $stackSize--;
                    continue;
                }
            }
            

            if($s[$i] == "}") {
                if($stack[$stackSize - 1] != "{") {
                    return false;
                } else {
                    array_pop($stack);
                    $stackSize--;
                }
            }
        }

        if($stackSize == 0) {
            return true;
        } else {
            return false;
        }
    }
}

$s = "()[]{}";

$solution = new Solution();

print_r($solution->isValid( $s ), false);