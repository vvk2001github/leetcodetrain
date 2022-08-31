<?php

// 322

// You are given an integer array coins representing coins of different denominations and 
// an integer amount representing a total amount of money.

// Return the fewest number of coins that you need to make up that amount. 
// If that amount of money cannot be made up by any combination of the coins, return -1.

// You may assume that you have an infinite number of each kind of coin.

class Solution {

    private int $result = PHP_INT_MAX;

    private array $coins = [];

    private array $cache = [];

    private int $countCoins = 0;

    private function doit(int $amount, int $level = 0): void {

        if($level >= $this->result) return;

        if(isset($this->cache[$amount])) return;

        for($i = 0; $i < $this->countCoins; $i++) {

            $tmp = $amount - $this->coins[$i];

            if($tmp > 0) {
                $this->doit($tmp, $level + 1);
            }

            if($tmp == 0) {
                $this->result = min($this->result, $level + 1);
            }

            if($tmp < 0 ) {
                $this->cache[$tmp] = -1;
            }
        }
    }

    /**
     * @param int[] $coins
     * @param int $amount
     * @return int
     */
    function coinChange($coins, $amount) {
        $this->countCoins = count($coins);

        rsort($coins);
        $this->coins = $coins;
        
        $this->doit($amount);

        return $this->result;
    }
}

// $coins = [1,2,5]; $amount = 11;
// $coins = [2]; $amount = 3;
$coins = [186,419,83,408]; $amount = 6249;
// $coins = [1, 3 ,4, 5]; $amount = 7;

$solution = new Solution();

print_r($solution->coinChange( $coins, $amount ), false);