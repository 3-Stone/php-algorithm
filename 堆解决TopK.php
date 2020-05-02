<?php

/**
 * 时间复杂度：O(n*log(K))
 *
 * 步骤：
 *  1、先构建一个大小为k的小顶堆
 *  2、将数组剩余元素逐个入堆，与堆顶对比
 *  3、如果比堆顶大，移除堆顶，堆顶设置为当前元素，调整堆
 *  4、如果比堆顶小，不做任何操作
 */

$k = 5;

$arr = [30, 29, 17, 32, 18, 47, 59, 60];

// 最后一个非叶子节点位置
$lastNodeIndex = intval(floor($k / 2)) - 1;

// 由最后一个非叶子节点开始，向根节点方向遍历，构造小顶堆
for ($i = $lastNodeIndex; $i >= 0; $i--) {
    constructMinHeap($arr, $i, $k);
}

for ($i = $k; $i <= count($arr) - 1; $i++) {
    $tmp = $arr[$i];

    if ($arr[$i] > $arr[0]) {

        list($arr[0], $arr[$i]) = [$arr[$i], $arr[0]];

        constructMinHeap($arr, 0, $k);
    }
}
var_dump($arr);
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