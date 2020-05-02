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

class SingleLinkList
{
    private $headNode;      // 头节点
    private $len;           // 节点数量

    public function __construct()
    {
        $this->init();
    }

    /**
     * 链表初始化（生成头结点、初始化链表长度）
     */
    private function init()
    {
        $this->headNode = new Node(null, null);
        $this->len = 0;
    }

    /**
     * 获取链表节点数量
     *
     * @return int
     */
    public function len()
    {
        return $this->len;
    }

    public function getHeadNode()
    {
        return $this->headNode;
    }

    /**
     * 插入节点
     *
     * @param $data
     * @param int $prevIndex 插入前一节点位置，0：插入头结点后，也就是第一个节点，1：第一个节点后（头结点的后一个的后一个）
     * @return bool
     */
    public function insert($data, $prevIndex = 0)
    {
        if (!is_integer($prevIndex) || $prevIndex < 0 || $prevIndex > $this->len) {
            return false;
        }

        $node = $this->getHeadNode();

        $i = 0;

        // 遍历链表，找到对应节点
        while ($node->next !== null) {
            if ($prevIndex === $i) {
                break;
            }

            $node = $node->next;
            $i++;
        }

        $newNode = new Node($data, $node->next);
        $node->next = $newNode;
        $this->len++;
        return true;
    }

    /**
     * 删除某个位置上的节点
     *
     * @param $index
     * @return bool
     */
    public function delete($index)
    {
        if (!is_integer($index) || $index < 1 || $index > $this->len) {
            return false;
        }

        $node = $this->getHeadNode();
        $i = 1;

        while ($node->next !== null) {

            if ($index === $i) {
                break;
            }

            $node = $node->next;
            $i++;
        }
        $node->next = $node->next->next;
        $this->len--;
    }

    public function update($index, $data)
    {
        if (!is_integer($index) || $index < 1 || $index > $this->len) {
            return false;
        }

        $node = $this->getHeadNode();
        $i = 1;

        while ($node->next !== null) {
            if ($index === $i) {
                break;
            }
            $node = $node->next;
            $i++;
        }

        $node->next->data = $data;

        return true;
    }

    /**
     * 获取某个位置上的节点
     *
     * @param $index
     * @return bool|Node
     */
    public function get($index)
    {
        if (!is_integer($index) || $index < 1 || $index > $this->len) {
            return false;
        }

        $node = $this->getHeadNode();
        $i = 1;
        while ($node->next !== null) {
            if ($index === $i) {
                return $node->next;
            }
            $node = $node->next;
            $i++;
        }

        return new Node(null, null);
    }

    /**
     * 打印整个链表
     */
    public function dump()
    {
        $node = $this->getHeadNode();

        print_r("<pre>");
        print_r($node);
        print_r("</pre>");
    }
}

$singleLinkList = new SingleLinkList();

$singleLinkList->insert('123');
$singleLinkList->insert('456', 1);
$singleLinkList->insert('789', 2);

print_r("执行添加操作后：");
print_r("<pre>");
print_r($singleLinkList);
print_r("</pre>");

$singleLinkList->update(2, '9999');
print_r("执行修改操作后：");
print_r("<pre>");
print_r($singleLinkList);
print_r("</pre>");

$getNode = $singleLinkList->get(2);
print_r("执行查找操作后：");
print_r("<pre>");
print_r($getNode);
print_r("</pre>");

$singleLinkList->delete(1);
print_r("执行删除操作后：");
print_r("<pre>");
print_r($singleLinkList);
print_r("</pre>");


