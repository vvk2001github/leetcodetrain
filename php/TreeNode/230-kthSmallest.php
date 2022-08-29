<?php

// 230

// Given the root of a binary search tree, and an integer k, 
// return the kth smallest value (1-indexed) of all the values of the nodes in the tree.

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

    private array $arr;

    private function treeToArray(TreeNode | null $node): void {
        if(is_null($node)) return;
        $this->arr[] = $node->val;
        $this->treeToArray($node->left);
        $this->treeToArray($node->right);
    }

    /**
     * @param TreeNode $root
     * @param int $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        $this->arr = [];
        $this->treeToArray($root);

        sort($this->arr);

        return $this->arr[$k - 1];
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);
$node6 = new TreeNode(6);

$node5->left = $node3;
$node5->right = $node6;

$node3->left = $node2;
$node3->right = $node4;

$node2->left = $node1;

$k = 3;

$solution = new Solution();

print_r($solution->kthSmallest( $node5, $k ), false);