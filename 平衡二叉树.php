<?php
class Node
{
    public $val;
    public $left;
    public $right;

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


$node1->right = $node3;

$node3->left = $node6;
$node3->right = $node7;


$a = isBalTree($node1);

var_dump($a);

// 核心思想：计算每一个节点的左右子树深度差，是否都小于等于1，如果都平衡，那这棵树就平衡
function isBalTree($root)
{

}

function getDeep($node)
{

}
