<?php
/**
 * @Desc: 二维数组排序
 * @Date: ${DATA}
 * @Time: 3:03 下午
 */


function twoAreaSort() {

    $data = [
        ['name' => 'a', 'score' => 1],
        ['name' => 'c', 'score' => 9],
        ['name' => 'b', 'score' => 2],
        ['name' => 'd', 'score' => 4],
        ['name' => 'b', 'score' => 5],
        ['name' => 'c', 'score' => 3],

    ];

    $keys = [];
    $kvMap = [];
    foreach ($data as $v) {
        $keys[] = $v['name'];
        $kvMap[$v['name']][] = $v['score'];
    }
    $keys = array_unique($keys);
    sort($keys);

    $result = [];
    foreach ($keys as $k) {
        $tempValue = $kvMap[$k];
        rsort($tempValue);
        foreach ($tempValue as $v) {
            $result[] = ['name'=> $k,'score' => $v];
        }
    }

    foreach ($result as $item) {
        echo $item['name'].' '.$item['score'].PHP_EOL;
    }

}

twoAreaSort();