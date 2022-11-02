<?php

// Build Tree From Array

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


$arr = [5,4,8,11,null,13,4,7,2, null, null,5,1];
// $arr = [1, 2, 3];

print_r(treeFromArray2( $arr ), false);