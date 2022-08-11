<?php
// You are given an array prices where prices[i] is the price of a given stock on the ith day.

// You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.

// Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.

class Solution {

    /**
     * @param int[] $prices
     * @return int
     */
    function maxProfit($prices) {
        $profit = 0;
        $minPrice = $prices[0];

        for($i = 1; $i < count($prices); $i++) {
            $profit = max($prices[$i] - $minPrice, $profit);
            $minPrice = min($prices[$i], $minPrice);
        }

        return $profit;
    }
}

$prices = [7,1,5,3,6,4];
//$prices = [7,6,4,3,1];

$solution = new Solution();
print_r($solution->maxProfit( $prices ), false);