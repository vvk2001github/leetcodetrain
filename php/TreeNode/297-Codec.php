<?php

// 297. Serialize and Deserialize Binary Tree

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

class Codec {
    function __construct() {
        
    }
  
    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        $vals = [];
        $q = new SplQueue();
        $q->enqueue($root);

        while(!$q->isEmpty()) {
            $node = $q->dequeue();
            if($node !== null) {
                $vals[] = $node->val;
                $q->enqueue($node->left);
                $q->enqueue($node->right);
            } else {
                $vals[] = null;
            }
        }

        return rtrim(implode('#', $vals), '#');
    }

    private function getNext(&$data, &$pointer){
        $buf = '';
        
        while($pointer < strlen($data)){
            if($data[$pointer]!=='#') {
                $buf .= $data[$pointer];
            } else {
                break;
            }
            $pointer++;
        }

        $pointer++;
        return $buf;
    }

    private function treeFromArray(string &$data): ?TreeNode {
        $queue = new SplQueue();
        $pos = 0;
        $next = $this->getNext($data, $pos);
        $queue->enqueue(new TreeNode($next));
        $root = null;

        while(!$queue->isEmpty()) {
            $tree = $queue->dequeue();

            if(is_null($root)) {
                $root = $tree;
            }

            $next = $this->getNext($data, $pos);

            if($next !== ''){
                $tree->left = new TreeNode($next);
                $queue->enqueue($tree->left);
            } else {
                $tree->left = null;
            }
            
            $next = $this->getNext($data, $pos);
            
            if($next !== ''){
                $tree->right = new TreeNode($next);
                $queue->enqueue($tree->right);
            } else {
                $tree->right = null;
            }
        }

        return $root;
    }
    
  
    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        // $vals = explode('#', $data);
        return $this->treeFromArray($data);
    }
}

function treeFromArray(array &$arr = [], int $pos = 0): ?TreeNode {

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

$root = treeFromArray($arr);

$ser = new Codec();
$deser = new Codec();

$data = $ser->serialize($root);
$ans = $deser->deserialize($data);

print_r($data, false);