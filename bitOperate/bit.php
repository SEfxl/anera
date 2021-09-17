<?php
/**
 * @Desc:
 * @Date: ${DATA}
 * @Time: 3:30 下午
 */

class Bit {

    /**
     * 数字n二进制串中1的个数
     * @param $n
     */
    public function hanMingWeight($n) {

        $res = 0;
        $tmp = $n;
        while ($n != 0) {
            echo $n.' ';
            $n = $n & ($n-1);
            $res++;
        }
        echo PHP_EOL;
        echo $tmp." 的二进制表示中1的个数为：".$res.PHP_EOL;

    }


    /**
     * 找有序成对数组中单独的哪一个
     * @date 2021-09-16
     */
    public function getSingleNum() {

        //$data = [2,2,3,3,4,4,5,5,6,6,7];
        $data = [2,3,3,2,4,5,6,4,5,6,7];

        $length  = count($data);

        $num = $data[0];

        for ($i=1;$i<$length;$i++) {
            $num ^= $data[$i];
        }

        echo $num.PHP_EOL;

    }

    




}

$obj = new Bit();
//$obj->hanMingWeight(7);
$obj->getSingleNum();