<?php

// 108

// Given an integer array nums where the elements are sorted in ascending order, convert it to a height-balanced binary search tree.

// A height-balanced binary tree is a binary tree in which the depth of the two subtrees of every node never differs by more than one.

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

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

    function buildBalanceTree($nums) {
        if(empty($nums)) return null;
        $length = count($nums);

        $rootNodeIndex = floor($length / 2);
        $tree = new TreeNode($nums[$rootNodeIndex]);
        $left = array_slice($nums, 0, $rootNodeIndex);
        $tree->left = $this->buildBalanceTree($left);
        $right = array_slice($nums, $rootNodeIndex + 1, $length - $rootNodeIndex);
        $tree->right = $this->buildBalanceTree($right);
        return $tree;
    }

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        if(empty($nums)) return null;

        return $this->buildBalanceTree($nums);
    }
}

$solution = new Solution();
$nums = [-10,-3,0,5,9];

print_r($solution->sortedArrayToBST( $nums ), false);
