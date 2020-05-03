<?php

/**
 *
 * 时间复杂度：O(n*log(n))
 *
 * 步骤：
 *  归并比较抽象，可以用笔画一下，再结合一些gif动画，会更好理解一下
 *
 * 通俗的说：
 *  不断递归，直到left与right都为1时，合并数组，且递归结束，此时需要向上递归，合并数组
 *
 *  1、第一次均分，left为657，right为289
 *  2、left进行递归均分，left为6，right为57
 *  3、right进行递归均分，left为5，right为7
 *  4、此时，对5和7进行排序，排序后合并成为一个数组A：57
 *  5、第4步中，这个排好序的数组A，与第2步中的left进行排序，然后合并成一个排好序的数组B：567
 *  6、第1步中的right重复执行上述步骤后，合并成一个排好序的数组C：289
 *  7、对数组B和数组C进行合并排序，最后，合并成一个排好序的数组D：256789
 *  8、结束
 *
 */

$arr = [6, 5, 7, 2, 8, 9];

$sortArr = mergeSort($arr);

var_dump($sortArr);

function mergeSort($arr) {

    if (count($arr) <= 1) {
        return $arr;
    }

    $middle = floor(count($arr) / 2);

    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    $left = mergeSort($left);       // 最终：$left为567
    $right = mergeSort($right);     // 最终：$right为289

    return merge($left, $right);
}

function merge($arrA, $arrB)
{
    $arrC = [];

    while (!empty($arrA) && !empty($arrB)) {
        // 如果要降序，这里改为大于
        $arrC[] = $arrA[0] < $arrB[0] ? array_shift($arrA) : array_shift($arrB);
    }

    return array_merge($arrC, $arrA, $arrB);
}