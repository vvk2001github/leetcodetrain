<?php

// 322

// You are given an integer array coins representing coins of different denominations and 
// an integer amount representing a total amount of money.

// Return the fewest number of coins that you need to make up that amount. 
// If that amount of money cannot be made up by any combination of the coins, return -1.

// You may assume that you have an infinite number of each kind of coin.

class Solution {

    /**
     * @param int[] $coins
     * @param int $amount
     * @return int
     */
    function coinChange($coins, $amount) {
        $dp = array_fill(0, $amount + 1, PHP_INT_MAX);
        $dp[0] = 0;

        for($a = 1; $a <= $amount; $a++) {
            for($c = 0; $c < count($coins); $c++) {
                $tmp_c = $coins[$c]; 
                if($a - $coins[$c] >= 0) {
                    $tmp_dp_a = $dp[$a];
                    $tmp_dp_a_c = $dp[$a - $tmp_c];
                    $dp[$a] = min($dp[$a], 1 + $dp[$a - $coins[$c]]);
                }
            }
        }

        if($dp[$amount] != PHP_INT_MAX) {
            return $dp[$amount];
        } else {
            return -1;
        }
    }
}

$coins = [1,2,5]; $amount = 11;
// $coins = [2]; $amount = 3;
// $coins = [186,419,83,408]; $amount = 6249;
// $coins = [1, 3 ,4, 5]; $amount = 7;

$solution = new Solution();

print_r($solution->coinChange( $coins, $amount ), false);