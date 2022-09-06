<?php

// 227. Basic Calculator II

// Given a string s which represents an expression, 
// evaluate this expression and return its value. 

// The integer division should truncate toward zero.

// You may assume that the given expression is always valid. 
// All intermediate results will be in the range of [-231, 231 - 1].

// Note: You are not allowed to use any built-in function which evaluates strings as mathematical expressions, such as eval().

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $s = str_replace(' ', '', $s);

        $numbers = [];
        $operations = [];
        $stack = [];
        preg_match_all('!\d+!', $s, $numbers);
        preg_match_all('[\+|\*|\-|\/]', $s, $operations);
        $numbers = $numbers[0];
        $operations = $operations[0];
        $countOps = count($operations);

        array_push($stack, intval($numbers[0]));

        for($i = 0; $i < $countOps; $i++) {
            $current = intval($numbers[$i+1]);

            if($operations[$i] == '*') {
                $current = array_pop($stack) * $current;
            } 

            if($operations[$i] == '/') {

                $tmp = array_pop($stack);
                if($tmp > 0) {
                    $current = floor($tmp / $current);
                } else {
                    $current = 0 - floor(abs($tmp) / $current);
                }
            }
            
            if($operations[$i] == '-') {
                $current = 0 - $current;
            }

            array_push($stack, $current);
        }

        $result = array_sum($stack);

        return $result;
    }
}

// $s = "3 + 2 * 2 + 7";
$s = "14-3/2";

$solution = new Solution();

print_r($solution->calculate( $s ), false);