<?php

/**
 * 深度：递归
 * 广度：迭代
 */
class Node
{
    public $left = null;
    public $right = null;
    public $val = null;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);

$node1->left = $node2;
$node1->right = $node4;
$node2->left = $node5;
$node2->right = $node6;

// 深度遍历（深度优先遍历）（前序：根-》左-》右）
function deep_travel_prev($listNode)
{
    if (!empty($listNode)) {
        echo $listNode->val . "\n";
        deep_travel_prev($listNode->left);
        deep_travel_prev($listNode->right);
    }
}

// 深度遍历（中序：左-》根-》右）
function deep_travel_mid($listNode)
{
    if (!empty($listNode)) {
        deep_travel_mid($listNode->left);
        echo $listNode->val . "\n";
        deep_travel_mid($listNode->right);
    }
}

// 深度遍历（后序：左-》右-》根）
function deep_travel_next($listNode)
{
    if (!empty($listNode)) {
        deep_travel_next($listNode->left);
        deep_travel_next($listNode->right);
        echo $listNode->val . "\n";
    }
}

deep_travel_prev($node1);
echo "-------------\n";
deep_travel_mid($node1);
echo "-------------\n";
deep_travel_next($node1);
echo "-------------\n";

span_travel($node1);
// 广度遍历，输出节点内容
function span_travel($listNode)
{
    $list = [];

    // 直接把根节点压入队列
    array_push($list, $listNode);

    while (!empty($list)) {
        $node = array_shift($list);

        echo $node->val . "\n";
        if (!empty($node->left)) {
            array_push($list, $node->left);
        }
        if (!empty($node->right)) {
            array_push($list, $node->right);
        }
    }
}