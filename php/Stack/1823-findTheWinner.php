<?php

// 1823. Find the Winner of the Circular Game

// There are n friends that are playing a game. 
// The friends are sitting in a circle and are numbered from 1 to n in clockwise order. 
// More formally, moving clockwise from the ith friend brings you to the (i+1)th friend for 1 <= i < n, 
// and moving clockwise from the nth friend brings you to the 1st friend.

// The rules of the game are as follows:

//     Start at the 1st friend.
//     Count the next k friends in the clockwise direction including the friend you started at. 
//     The counting wraps around the circle and may count some friends more than once.
//     The last friend you counted leaves the circle and loses the game.
//     If there is still more than one friend in the circle, 
//     go back to step 2 starting from the friend immediately clockwise of the friend who just lost and repeat.
//     Else, the last friend in the circle wins the game.

// Given the number of friends, n, and an integer k, return the winner of the game.

class Node {
    function __construct(public int $val = 0, public ?Node $next = null, public ?Node $prev = null) {
        //
    }

    public function remove(): void {
        $this->prev->next = $this->next;
        $this->next->prev = $this->prev;
    }
}

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findTheWinner($n, $k) {
        $firstNode = new Node(1);
        $prevNode = $firstNode;
        for($i = 2; $i <= $n; $i++) {
            $currentNode = new Node(val: $i, prev: $prevNode);
            $prevNode->next = $currentNode;
            $prevNode = $currentNode;
        }

        $firstNode->prev = $prevNode;
        $prevNode->next = $firstNode;

        $currentNode = $prevNode;

        for($i = 0; $i < $n; $i++) {
            for($j = 0; $j < $k; $j++){
                $currentNode = $currentNode->next;
            }
            $currentNode->remove();
        }

        return $currentNode->val;
    }
}

$n = 5; $k = 2;

$solution = new Solution();

print_r( $solution->findTheWinner($n, $k), false);