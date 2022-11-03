<?php

// 111. Minimum Depth of Binary Tree

// Given a binary tree, find its minimum depth.

// The minimum depth is the number of nodes along the shortest path from the root node down to the nearest leaf node.

// Note: A leaf is a node with no children.

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

function treeFromArray2(array &$arr): ?TreeNode {

    $queue = new SplQueue();
    $pos = 0;
    $next = $arr[$pos++];
    $queue->enqueue(new TreeNode($next));
    $root = null;

    while(!$queue->isEmpty()) {
        $tree = $queue->dequeue();

        if(is_null($root)) {
            $root = $tree;
        }

        $next = $arr[$pos++] ?? null;

        if($next !== null){
            $tree->left = new TreeNode($next);
            $queue->enqueue($tree->left);
        } else {
            $tree->left = null;
        }
        
        $next = $arr[$pos++] ?? null;
        
        if($next !== null){
            $tree->right = new TreeNode($next);
            $queue->enqueue($tree->right);
        } else {
            $tree->right = null;
        }
    }

    return $root;
}

class Solution {

    private int $minD;

    private function foo(?TreeNode $root, int $level = 1): void {
        if($root->left === null && $root->right === null) {
            $this->minD = min($level, $this->minD);
            return;
        }

        $level++;

        if($level >= $this->minD) {
            return;
        }

        if($root->left) {
            $this->foo($root->left, $level);
        }

        if($root->right) {
            $this->foo($root->right, $level);
        }
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {

        if($root === null) {
            return 0;
        }

        $this->minD = PHP_INT_MAX;

        $this->foo($root);

        return $this->minD;
    }
}

// $arr = [3,9,20,null,null,15,7];
$arr = [2,null,3,null,4,null,5,null,6];

$root = treeFromArray2($arr);

// print_r( $root , false);

$solution = new Solution();

print_r($solution->minDepth( $root ), false);