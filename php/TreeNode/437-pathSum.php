<?php

// 437

// Given the root of a binary tree and an integer targetSum, 
// return the number of paths where the sum of the values along the path equals targetSum.

// The path does not need to start or end at the root or a leaf, but it must go downwards 
// (i.e., traveling only from parent nodes to child nodes).

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    private int $count = 0;
    private int $targetSum = 0;

    private function traverseTree(TreeNode | null $currNode, int $summ) {
        if(is_null($currNode)) return;

        $summ += $currNode->val;
        if ($summ == $this->targetSum) $this->count++;

        $this->traverseTree($currNode->left, $summ);
        $this->traverseTree($currNode->right, $summ);
    }

    /**
     * @param TreeNode $root
     * @param int $targetSum
     * @return int
     */
    function pathSum($root, $targetSum) {
        $this->count = 0;
        $this->targetSum = $targetSum;

        $stack = [];
        $stack[] = $root;

        while(count($stack) > 0) {
            $top = array_pop($stack);

            if(!is_null($top)) {
                array_push($stack, $top->left);
                array_push($stack, $top->right);
            }

            $this->traverseTree($top, 0);
        }

        return $this->count;
    }
}

$solution = new Solution();

print_r($solution->pathSum( $node1 ), false);
