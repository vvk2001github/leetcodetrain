<?php

// 113. Path Sum II

// Given the root of a binary tree and an integer targetSum, 
// return all root-to-leaf paths where the sum of the node values in the path equals targetSum. 
// Each path should be returned as a list of the node values, not node references.

// A root-to-leaf path is a path starting from the root and ending at any leaf node. A leaf is a node with no children.

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

    private function traverse(?TreeNode $root = null, int $sum = 0, array $path = [], array &$paths): void {
        if(!$root) {
            return;
        }

        $path[] = $root->val;

        if($root->left === null && $root->right === null && $sum == $root->val) {
            $paths[] = $path;
            return;
        }

        $this->traverse($root->left, $sum - $root->val, $path, $paths);
        $this->traverse($root->right, $sum - $root->val, $path, $paths);
    }

    /**
     * @param TreeNode $root
     * @param int $targetSum
     * @return Integer[][]
     */
    function pathSum($root, $targetSum) {
        $result = [];
        $this->traverse(root: $root, sum: $targetSum, path: [], paths: $result);
        return $result;
    }
}

function treeFromArray(array &$arr = [], int $pos = 0): ?TreeNode {

    $root = null;
    if($pos < count($arr)) {
        if($arr[$pos] !== null) {
            $root = new TreeNode($arr[$pos]);
            $root->left = treeFromArray($arr, $pos * 2 + 1);
            $root->right = treeFromArray($arr, $pos * 2 + 2);
        }
    }

    return $root;
}

$arr = [5,4,8,11,null,13,4,7,2,null,null, null, null,5,1]; $targetSum = 22;
// $arr = [1, 2, 3];

$tree = treeFromArray($arr);

$solution = new Solution();

print_r($solution->pathSum( $tree, $targetSum ), false);