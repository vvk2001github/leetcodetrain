<?php

// 257. Binary Tree Paths

// Given the root of a binary tree, 
// return all root-to-leaf paths in any order.

// A leaf is a node with no children.

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

    private array $result;

    private function foo(TreeNode $root, array $curPath = []): void {
        $curPath[] = $root->val;

        if(!$root->left && !$root->right) {
            $this->result[] = $curPath;
            return;
        }

        if($root->left) {
            $this->foo($root->left, $curPath);
        }

        if($root->right) {
            $this->foo($root->right, $curPath);
        }

    }

    /**
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root) {
        $this->result = [];

        if($root) {
            $this->foo($root);
        }

        $result = [];
        $countResult = count($this->result);

        for($i = 0; $i < $countResult; $i++) {
            $result[] = implode('->', $this->result[$i]);
        }

        return $result;
    }
}

$arr = [1,2,3,null,5];

$root = treeFromArray2($arr);

$solution = new Solution();

print_r($solution->binaryTreePaths( $root ), false);