<?php

/**
 * 升序 => 小顶堆
 * 降序 => 大顶堆
 * 堆排时间复杂度：O(n*log(n))
 *
 * 堆的特性（i为数组索引，n为元素个数）：
 *  1、任一节点左孩子：2i+1
 *  2、任一节点右孩子：2i+2
 *  3、最后一个非叶子节点：floor(n / 2) - 1
 *
 * 步骤：
 *  1、对数组所有元素构建大顶堆
 *  2、根节点与堆尾互换
 *  3、重新构造大顶堆（呼喊后的数据不再参与构造，因已排好序）
 *
 */

$sortType = 1;	// 排序规则，1：升序，2：降序
$arr = [30, 29, 17, 32, 18, 47, 59, 60];
$len = count($arr);

// 最后一个非叶子节点位置
$lastNodeIndex = intval(floor($len / 2)) - 1;

// 由最后一个非叶子节点开始，向根节点方向遍历，构造大顶堆
for ($i = $lastNodeIndex; $i >= 0; $i--) {
	if ($sortType == 1) {
		constructMaxHeap($arr, $i, $len);
	} else {
		constructMinHeap($arr, $i, $len);
	}
}

// 有了大顶堆以后，根节点与尾节点位置互换，重新构造大顶堆
for ($i = $len - 1; $i >= 0; $i--) {
	
	// 根节点与尾节点互换
	list($arr[0], $arr[$i]) = [$arr[$i], $arr[0]];
	// 重新构造大顶堆，从根节点触发，且交换后的数据不再参与构造（因已排好序）
	if ($sortType == 1) {
		constructMaxHeap($arr, 0, $i);
	} else {
		constructMinHeap($arr, 0, $i);
	}
}

var_dump($arr);

function constructMaxHeap(&$arr, $start, $len)
{
	for ($child = ($start * 2) + 1; $child < $len; $child = ($child * 2) + 1) {

		// 如果不是最后一个节点 && 右节点 大于 左节点
		if ($child != $len - 1 && $arr[$child + 1] > $arr[$child]) {

			// 让右节点与父节点进行比较
			$child++;
		}

		if ($arr[$start] >= $arr[$child]) {
			break;
		}

		list($arr[$start], $arr[$child]) = [$arr[$child], $arr[$start]];
		
		$start = $child;
	}
}

function constructMinHeap(&$arr, $start, $len)
{
	for ($child = ($start * 2) + 1; $child < $len; $child = ($child * 2) + 1) {

		// 如果不是最后一个节点 && 右节点 大于 左节点
		if ($child != $len - 1 && $arr[$child + 1] < $arr[$child]) {

			// 让右节点与父节点进行比较
			$child++;
		}

		if ($arr[$start] <= $arr[$child]) {
			break;
		}

		list($arr[$start], $arr[$child]) = [$arr[$child], $arr[$start]];
		
		$start = $child;
	}
}