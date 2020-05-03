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

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = null;

$node5 = new Node('1', null);
$node6 = new Node('2', null);
$node7 = new Node('5', null);
$node8 = new Node('7', null);

$node5->next = $node6;
$node6->next = $node7;
$node7->next = $node8;
$node8->next = null;

$newLinkList = mergeLinkList($node1, $node5);

print_r('<pre>');
print_r($newLinkList);
print_r('</pre>');

function mergeLinkList($node1, $node2)
{
    $headNode = new Node(null, null);

    // 定义一个空链表
    $p = $headNode;

    while ($node1->next !== null && $node2->next !== null) {

        // 如果node1节点数据 小于 node2节点数据，那就把node1节点插入到新链表，且$p后移、node1或node2后移
        if ($node1->data < $node2->data) {

            $p->next = $node1;
            $p = $p->next;

            $node1 = $node1->next;
        } else {

            $p->next = $node2;
            $p = $p->next;

            $node2 = $node2->next;
        }
    }

    // 如果node1链表没有遍历完，那就全部插入到新链表中
    if ($node1->next !== null) {
        $p->next = $node1;
    }
    // 如果node2链表没有遍历完，那就全部插入到新链表中
    else if ($node2->next !== null) {
        $p->next = $node2;
    }

    return $headNode;
}
