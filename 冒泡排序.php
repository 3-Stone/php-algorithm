<?php

/**
 *
 * 时间复杂度：O(n^2)
 *
 * 步骤：
 *  1、外循环是需要进行排序的次数
 *  2、内循环是不断比较相邻的两个元素，找出最大的元素放在后面（找出最小的元素放在前面）
 *  3、外循环结束后，排序完成
 *
 */

$arr = [4, 8, 2, 4, 5, 7, 9, 0];

bubbleSort($arr);

var_dump($arr);

function bubbleSort(&$arr)
{
    $arrLen = count($arr);

    for ($i = 0; $i < $arrLen - 1; $i++) {

        for ($j = 0; $j < $arrLen - $i - 1; $j++) {

            // 如果是倒序，这里是大于
            if ($arr[$j+1] < $arr[$j]) {
                list($arr[$j+1], $arr[$j]) = [$arr[$j], $arr[$j+1]];
            }
        }
    }
}