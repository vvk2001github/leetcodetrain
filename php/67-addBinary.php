<?php

//  67. Add Binary

// Given two binary strings a and b, return their sum as a binary string.

class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $result = '';
        $carry = 0;
        $ord_0 = ord('0');
        $len_a = strlen($a);
        $len_b = strlen($b);
        
        if($len_b > $len_a) {
            [$len_a, $len_b] = [$len_b, $len_a];
            [$a, $b] = [$b, $a];
        }
        $dif_len = $len_a - $len_b;

        for($i = ($len_b - 1); $i>=0; $i--) {
            $tmp_a = ord($a[$i + $dif_len]) - $ord_0;
            $tmp_b = ord($b[$i]) - $ord_0;
            $newCarry = floor(($tmp_a + $tmp_b + $carry) / 2);
            $result = chr((($tmp_a + $tmp_b + $carry) % 2) + $ord_0) . $result;
            $carry = $newCarry;
        }

        for($i = ($len_a - $len_b - 1); $i>=0; $i--) {
            $tmp_a = ord($a[$i]) - $ord_0;
            $newCarry = floor(($tmp_a  + $carry) / 2);
            $result = chr((($tmp_a  + $carry) % 2) + $ord_0) . $result;
            $carry = $newCarry;
        }

        if($carry > 0 ) $result = '1'.$result;

        return $result;
    }
}
$a = "100"; $b = "110010";

$solution = new Solution();

print_r($solution->addBinary( $a, $b ), false);
