<?php
/**
 * @file         string.php
 * @description  ÃèÊö
 * @author       fuxinliang <fuxinliang@zuoyebang.com>
 * @date         2021-09-12
 */

class stringOperate
{
    public function revertString($str) {

        if(empty($str)) {
            return false;
        }

        $length = strlen($str);


        for ($i = 0, $j = $length - 1; $i < $j; $i++, $j--) {
            echo 'i=' . $i . ' j=' . $j . PHP_EOL;
            $tmp = $str[$i];
            $str[$i] = $str[$j];
            $str[$j] = $tmp;
        }

        echo $str.PHP_EOL;

    }
}


$obj = new stringOperate();
$str = 'abcdefgh';
$obj->revertString($str);