<?php

// 43

// Given two non-negative integers num1 and num2 represented as strings, 
// return the product of num1 and num2, also represented as a string.

// Note: You must not use any built-in BigInteger library or convert the inputs to integer directly.

class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {
        $num1_len = strlen($num1);
        $num2_len = strlen($num2);
        $row = [];
        $shift = 0;
        $max_len = 0;
        $result = '';

        for($i = $num2_len - 1; $i >=0; $i--){
            $carry = 0;
            $cur_num2 = ord($num2[$i]) - 48;
            $cur_row = '';
            for($j = $num1_len - 1; $j >=0; $j--) {
                $cur_num1 = ord($num1[$j]) - 48;
                $tmp_mul = $cur_num1 * $cur_num2 + $carry;

                $cur_row = chr($tmp_mul % 10 + 48) . $cur_row;
                $carry = intval(floor($tmp_mul / 10));
            }

            if($carry !=0) $cur_row = chr($carry + 48) . $cur_row;

            for($j = 0; $j < $shift; $j++) {
                $cur_row .= '0';
            }

            $row[] = $cur_row;
            $max_len = max($max_len, strlen($cur_row));
            $shift++;
        }

        $row_len = count($row);

        for($i = 0; $i < $row_len; $i++) {
            for($j = strlen($row[$i]); $j < $max_len; $j++) {
                $row[$i] = '0'.$row[$i];
            }
        }

        $carry = 0;
        for($i = $max_len - 1; $i >= 0; $i--) {
            $tmp_sum = 0;
            for($j = 0; $j < $row_len; $j++) {
                $tmp_sum += ord($row[$j][$i]) - 48;
            }
            $tmp_sum += $carry;
            $result = chr($tmp_sum % 10 + 48) . $result;
            $carry = intval(floor($tmp_sum / 10));
        }

        if($carry !=0) $result = chr($carry + 48) . $result;

        
        while(($result[0] == '0') && (strlen($result) > 1)) {
            $result = substr($result, 1);
        }

        return $result;
    }
}

// $num1 = "2"; $num2 = "3";
//$num1 = "123"; $num2 = "456";
// $num1 = "999"; $num2 = "111";
$num1 = "9133"; $num2 = "0";

$solution = new Solution();

print_r( $solution->multiply($num1, $num2), false);


