<?php

// 103. Binary Tree Zigzag Level Order Traversal


// Given the root of a binary tree, 
// return the zigzag level order traversal of its nodes' values. 
// (i.e., from left to right, then right to left for the next level and alternate between).

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

    private array $result;

    private function breadth_first(array $nodes = [], int $level = 0): void {
        $count = count($nodes);

        if($count == 0) return;

        $newNodes = [];
        $res = [];
        if($level % 2 == 0) {
            for($i = 0; $i < $count; $i++) {
                $res[] = $nodes[$i]->val;
                if($nodes[$i]->left) $newNodes[] = $nodes[$i]->left;
                if($nodes[$i]->right) $newNodes[] = $nodes[$i]->right;
            }
        } else {
            for($i = $count - 1; $i >= 0; $i--) {
                $res[] = $nodes[$i]->val;
                if($nodes[$count - $i - 1]->left) $newNodes[] = $nodes[$count - $i - 1]->left;
                if($nodes[$count - $i - 1]->right) $newNodes[] = $nodes[$count - $i - 1]->right;
            }
        }
        

        $this->result[] = $res;
        $this->breadth_first($newNodes, $level + 1);
    }

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {

        if(!$root) return [];

        $this->result = [];
        $this->breadth_first([$root]);
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

print_r($solution->zigzagLevelOrder( $node3 ), false);