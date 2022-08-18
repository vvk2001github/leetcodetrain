<?php

// 299

// You are playing the Bulls and Cows game with your friend.

// You write down a secret number and ask your friend to guess what the number is. 
// When your friend makes a guess, you provide a hint with the following info:

//     The number of "bulls", which are digits in the guess that are in the correct position.
//     The number of "cows", which are digits in the guess that are in your secret number but are located in the wrong position. 
//     Specifically, the non-bull digits in the guess that could be rearranged such that they become bulls.

// Given the secret number secret and your friend's guess guess, return the hint for your friend's guess.

// The hint should be formatted as "xAyB", where x is the number of bulls and y is the number of cows. 
// Note that both secret and guess may contain duplicate digits.

class Solution {

    /**
     * @param String $secret
     * @param String $guess
     * @return String
     */
    function getHint($secret, $guess) {
        $A = 0;
        $B = 0;
        $len_secret = strlen($secret);
        $used_guess = array_fill(0, $len_secret, false);
        $used_sec = array_fill(0, $len_secret, false);

        for($i = 0; $i < $len_secret; $i++) {
            if($secret[$i] === $guess[$i]) {
                $A++;
                $used_guess[$i] = true;
                $used_sec[$i] = true;
            }
        }

        for($i = 0; $i < $len_secret; $i++) {
            if($used_guess[$i]) continue;
            $pos = -1;
            do {
                $pos = strpos($secret, $guess[$i], $pos + 1);
            }while(($pos !== false) && ($used_sec[$pos] === true));
            if($pos !== false) {
                $used_sec[$pos] = true;
                $B++;
            }
        }

        return $A.'A'.$B.'B';
    }
}

$secret = "1807";
$guess = "7810";

$solution = new Solution();

print_r( $solution->getHint($secret, $guess), false);