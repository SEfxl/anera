<?php
/**
 * @Desc: 二维数组排序
 * @Date: ${DATA}
 * @Time: 3:03 下午
 */

class sort {

    public $arr = [];

    public function twoAreaSort() {

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

    /**
     * 快速排序
     * @param $left
     * @param $right
     */
    public function quickSort($left,$right) {

        if ($left > $right) {
            return;
        }

        $i = $left;
        $j = $right;
        $temp = $this->arr[$left];

        while ($i != $j) {

            while ($this->arr[$j] >= $temp && $i<$j) {
                $j--;
            }

            while ($this->arr[$i] <= $temp && $i < $j) {
                $i++;
            }

            if($i < $j) {
                $t = $this->arr[$i];
                $this->arr[$i] = $this->arr[$j];
                $this->arr[$j] = $t;
            }

        }

        $this->arr[$left] = $this->arr[$i];
        $this->arr[$i] = $temp;

        $this->quickSort($left,$i-1);
        $this->quickSort($i+1,$right);

    }

    public function quickSort2($left,$right) {

        if($left > $right) {
            return ;
        }

        $i=$left;
        $j=$right;
        $tmp = $this->arr[$left];

        while ($i != $j) {

            while ($i < $j && $this->arr[$j] >= $tmp ) {
                $j--;
            }

            while ($i < $j && $this->arr[$i] <= $tmp) {
                $i++;
            }




        }



    }

    public function bubbleSort() {

        $data = [1, 3, 5, 7, 9, 2, 4, 6, 8];
        $length = count($data);
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }

        foreach ($data as $v) {
            echo $v.' ';
        }
        echo PHP_EOL;

    }


}


$obj = new sort();
//$obj->twoAreaSort();
//$obj->arr = [1,3,5,7,9,2,4,6,8,0];
//$length = count($obj->arr) - 1;
//$obj->quickSort(0,$length);
//foreach ($obj->arr as $v) {
//    echo $v.' ';
//}
//echo PHP_EOL;

$obj->bubbleSort();