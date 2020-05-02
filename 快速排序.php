<?php

/**
 *
 * 时间复杂度：O(n*log(n))
 *
 * 步骤：
 *  1、找出基准值（$arr[0]）
 *  2、比基准值大的，放在左面，比基准值小的，放在右面，与基准值相同的，左右都可以
 *  3、递归重复第2步，将左右两个数组，再次进行排序
 *  4、当左与右，两个数组都只剩下小于等于1个元素时，递归结束，向上返回，排序结束
 *
 */

$arr = [4, 8, 2, 5, 7, 9, 0];

$sortArr = quickSort($arr);

var_dump($sortArr);

function quickSort($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }

    $middle = $arr[0];

    $leftArr = $rightArr = [];

    for ($i = 1; $i <= count($arr) -1; $i++) {
        if ($arr[$i] > $middle) {
            $rightArr[] = $arr[$i];
        } else {
            $leftArr[] = $arr[$i];
        }
    }
// 如果想不通递归的逻辑，在这里打印，可以帮助理解
// var_dump($leftArr, $middle, $rightArr, '=====分割线======');
    $leftArr = quickSort($leftArr);
    $rightArr = quickSort($rightArr);

    return array_merge($leftArr, [$middle], $rightArr);
}