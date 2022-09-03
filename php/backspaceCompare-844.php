<?php
// 844

// Given two strings s and t, 
// return true if they are equal when both are typed into empty text editors. 
// '#' means a backspace character.

// Note that after backspacing an empty text, the text will continue empty.

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        $i = 0;
        while($i < strlen(($s))) {
            if(($s[$i] == '#') && ($i > 0)) {
                $s = substr($s, 0, $i - 1) . substr($s, $i + 1);
                $i = $i - 1;
                continue;
            };

            if(($s[$i] == '#') && ($i == 0)) {
                $s = substr($s, $i + 1);
                continue;
            };
            $i++;
        }


        $i = 0;
        while($i < strlen(($t))) {
            if(($t[$i] == '#') && ($i > 0)) {
                $t = substr($t, 0, $i - 1) . substr($t, $i + 1);
                $i = $i - 1;
                continue;
            };

            if(($t[$i] == '#') && ($i == 0)) {
                $t = substr($t, $i + 1);
                continue;
            };
            $i++;
        }

        if($s == $t) return true;
        return false;

    }
}

$s = "a##c";
$t = "#a#c";

$solution = new Solution();

print_r( $solution->backspaceCompare($s, $t), false);

