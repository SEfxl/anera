<?php
/**
 * @file         section.php
 * @description  描述
 * @author       fuxinliang <fuxinliang@zuoyebang.com>
 * @date         2021-09-17
 */

class section
{


    /**
     * 获取没有被覆盖区间的数目
     * @date         2021-09-17
     *
     * @param $data
     */
    public function getNoCoverSectionNum( $data ) {
        $firstData = [];
        $secondData = [];
        $length = 0;
        foreach ($data as $item) {
            $firstData[] = $item[0];
            $secondData[] = $item[1];
            $length++;
        }
        array_multisort($firstData,SORT_ASC,$secondData,SORT_DESC,$data);

        $num = 0;
        $left = $data[0][0];
        $right = $data[0][1];

        for ($i = 1; $i < $length; $i++) {

            $nowLeft = $data[$i][0];
            $nowRight = $data[$i][1];

            //全覆盖
            if($left <= $nowLeft && $right >= $nowRight) {
                $num++;
            }

            //相交
            if($right > $nowLeft && $right < $nowRight) {
                $right = $nowRight;
            }

            //不相交
            if($right < $nowLeft)  {
                $left = $nowLeft;
                $right = $nowRight;
            }


        }
        $lastNum = $length - $num;
        echo "nums: ".$lastNum.PHP_EOL;
    }

    /**
     *合并相交区间
     * @param $data
     */
    public function mergeCrossInterval( $data ) {
        $firstData = [];
        $secondData = [];
        $length = 0;
        foreach ($data as $v) {
            $firstData[] = $v[0];
            $secondData[] = $v[1];
            $length++;
        }
        array_multisort($firstData, SORT_ASC, $secondData, SORT_DESC, $data);
        $result[] = $data[0];
        for ($i = 1; $i < $length; $i++) {
            $cur = $data[$i];
            $len = count($result);
            $lastData = $result[$len - 1];
            if($cur[0] <= $lastData[1]) {
                $result[$len -1][1] = $cur[1] > $lastData[1] ? $cur[1] : $lastData[1];
            } else {
                $result[] = $data[$i];
            }
        }

        foreach ($result ?:[] as $item) {
            echo $item[0].' '.$item[1].PHP_EOL;
        }

    }

    /**
     * 获取两个数组的交集
     * @param $A
     * @param $B
     */
    public function getArrayCrossArea($A,$B) {
        $lengthA =  count($A);
        $lengthB = count($B);
        $i = $j = 0;
        $result = [];
        while ($i < $lengthA && $j < $lengthB) {
            $a1 = $A[$i][0];
            $a2 = $A[$i][1];
            $b1 = $B[$j][0];
            $b2 = $B[$j][1];
            //a1  b1 a2 b2
            if($b2 >= $a1 && $a2 >= $b1) {
                $left = max($a1,$b1);
                $right = min($a2,$b2);
                $result[] = [$left,$right];
            }
            if($a2 > $b2) {
                $j++;
            }else {
                $i++;
            }
        }

        foreach ($result ?:[] as $item) {
            echo $item[0].' '.$item[1].PHP_EOL;
        }

    }


}

$obj = new section();
$data1 = [[1,4],[3,6],[2,8]];
//$obj->getNoCoverSectionNum($data1);

$data2 = [[1,3], [2,6], [8,10], [15,18]];
//$obj->mergeCrossInterval($data2);

$A = [[0, 2], [5, 10], [13, 23], [24, 25]];
$B = [[1, 5], [8, 12], [15, 24], [25, 26]];
$obj->getArrayCrossArea($A,$B);