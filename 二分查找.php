<?php

/**
 *
 * 时间复杂度：O(log(n))
 *
 * 步骤：
 *  1、数组必须有序
 *  2、每次对半查找
 *  3、直到找到查询的元素，结束
 *
 */

$sortedArr = [0, 1, 2, 3, 4, 5, 6];

$searchIndex = binarySearch($sortedArr, 3);

echo $searchIndex;

function binarySearch($sortedArr, $searchVal)
{
    $low = 0;
    $height = count($sortedArr) - 1;

    while ($low <= $height) {

        $middle = intval(floor(($low + $height) / 2));

        if ($sortedArr[$middle] == $searchVal) {
            return $middle;
        } else if ($sortedArr[$middle] > $searchVal) {
            $height = $middle - 1;
        } else {
            $low = $middle + 1;
        }
    }

    return false;
}

