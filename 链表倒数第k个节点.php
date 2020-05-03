<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data, $next)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

$node1 = new Node('1', null);
$node2 = new Node('2', null);
$node3 = new Node('3', null);
$node4 = new Node('4', null);
$node5 = new Node('5', null);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = null;

print_r('当前链表：');
print_r('<pre>');
print_r($node1);
print_r('</pre>');

$k = 2;

$kThNode = getKthNode($node1, $k);

print_r('倒序第' . $k . '个节点：');
print_r('<pre>');
print_r($kThNode);
print_r('</pre>');

function getKthNode($headNode, $k)
{
    // 快慢指向都先指向头节点
    $slow = $fast = $headNode;

    // 先让快指针走k-1步
    for ($i = 0; $i < $k - 1; $i++) {
        // 这里代表有后继节点
        if ($fast->next !== null) {
            $fast = $fast->next;
        }
        // 这里代表链表长度小于k，直接返回false
        else {
            return false;
        }
    }

    // 然后让快慢指针，每次都走一步，直到快指针到达尾节点，慢指针所指位置，即为倒数第k个节点
    // 快指针遍历结束后，两个指针的间隔是k-1，所以快指针的前一个，也就是慢指针，即为倒数为第k个节点
    while ($fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next;
    }

    return $slow;
}

