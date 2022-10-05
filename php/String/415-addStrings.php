<?php

// 415. Add Strings

// Given two non-negative integers, num1 and num2 represented as string, 
// return the sum of num1 and num2 as a string.

// You must solve the problem without using any built-in library for handling large integers (such as BigInteger). 
// You must also not convert the inputs to integers directly.


class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function addStrings($num1, $num2) {

        $result ='';

        $len = max(strlen($num1), strlen($num2));
        
        $num1 = str_pad($num1, $len, '0', STR_PAD_LEFT);
        $num2 = str_pad($num2, $len, '0', STR_PAD_LEFT);

        $carry = 0;
        $tmp_sum = 0;
        for($i = $len - 1; $i >= 0; $i--) {
            $tmp_sum = ord($num1[$i]) + ord($num2[$i]) + $carry - 96;
            $result = chr($tmp_sum % 10 + 48) . $result;
            $carry = intval(floor($tmp_sum / 10));
        }
        

        if($carry !=0) $result = chr($carry + 48) . $result;

        return $result;
    }
}

$num1 = "99"; $num2 = "99";

$solution = new Solution();

print_r( $solution->addStrings($num1, $num2), false);
