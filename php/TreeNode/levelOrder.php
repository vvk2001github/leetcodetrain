<?php
// 102

// Given the root of a binary tree, return the level order traversal of its nodes' values. (i.e., from left to right, level by level).
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

    private $result = array();

    function doit(TreeNode | null $root, int $level): void {
        if(!array_key_exists($level, $this->result)) $this->result[$level] = [];
        $this->result[$level][] = $root->val;
        
        if($root->left !== null) $this->doit($root->left, $level + 1);
        if($root->right !== null) $this->doit($root->right, $level + 1);
    }

    /**
     * @param TreeNode $root
     * @return int[][]
     */
    function levelOrder($root) {
        if(empty($root)) return [];
        $this->doit($root, 0);
        return $this->result;
    }
}

$node3 = new TreeNode(3);
$node9 = new TreeNode(9);
$node20 = new TreeNode(20);
$node15 = new TreeNode(15);
$node7 = new TreeNode(7);

$node3->left = $node9;
$node3->right = $node20;
$node20->left = $node15;
$node20->right = $node7;


$solution = new Solution();

print_r($solution->levelOrder( $node3 ), false);