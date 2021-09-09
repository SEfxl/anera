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

}

$obj = new Bit();
$obj->hanMingWeight(7);