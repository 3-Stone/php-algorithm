<?php
class Node
{
    public $val;
    public $left;

    public function __construct($data, $left, $right)
    {
        $this->val = $data;
        $this->left = $left;
        $this->right = $right;
    }
}

$node1 = new Node('1', null, null);
$node2 = new Node('2', null, null);
$node3 = new Node('2', null, null);
$node4 = new Node('3', null, null);
$node5 = new Node('4', null, null);
$node6 = new Node('4', null, null);
$node7 = new Node('3', null, null);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;

$node3->left = $node6;
$node3->right = $node7;


print_r('当前链表：');
print_r('<pre>');
print_r($node1);
print_r('</pre>');

$a = dc($node1);

var_dump($a);

// 核心思想：左右子树，同时递归对比
function dc($root)
{

    if (empty($root)) {
        return false;
    }

    return rec($root->left, $root->right);
}

function rec($left, $right)
{
    if (empty($left) && empty($right)) {
        return true;
    }

    if (empty($left) || empty($right) || $left->val != $right->val) {
        return false;
    }

    return rec($left->left, $right->right) && rec($left->right, $right->left);
}

