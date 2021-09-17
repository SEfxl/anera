<?php
/**
 * @file         Bin.php
 * @description  ÃèÊö
 * @author       fuxinliang <fuxinliang@zuoyebang.com>
 * @date         2021-09-12
 */

class Bin
{
    public function binSearch($data, $target) {

        if (empty($data)) {
            return false;
        }
        $left = 0;
        $right = count($data) - 1;
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($data[$mid] == $target) {
                return $mid;
            } elseif ($target > $data[$mid]) {
                $left = $mid + 1;
            } elseif ($target < $data[$mid]) {
                $right = $mid - 1;
            }
        }
        return false;
    }

    public function binSearchLeftBound($data, $target) {
        if(empty($data)) {
            return false;
        }
        $left = 0;
        $length = count($data);
        $right = $length - 1;
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if($target == $data[$mid]) {
                $right = $mid - 1 ;
            } elseif ($target > $data[$mid]) {
                $left = $mid + 1;
            }elseif ($target < $data[$mid]) {
                $right = $mid - 1;
            }
        }

        if($left >= $length || $data[$left] != $target) {
            return -1;
        }

        return $left;

    }

    public function binSearchRightBound($data,$target) {

        if(empty($data)) {
            return false;
        }

        $length = count($data);
        $left = 0;
        $right = $length - 1;

        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if($target == $data[$mid]) {
                $left = $mid + 1;
            }elseif ($target > $data[$mid]) {
                $left = $mid + 1;
            }elseif ($target < $data[$mid]) {
                $right = $mid - 1;
            }
        }

        if($right < 0 || $data[$right] != $target) {
            return -1;
        }

        return $right;

    }


}

$obj = new Bin();

//$data = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
//$target = 0;
//$res = $obj->binSearch($data, $target);
//if($res !== false) {
//    echo "index is : ".$res.PHP_EOL;
//}else {
//    echo "not found".PHP_EOL;
//}

//$data2 = [1,2,2,2,3];
//$res = $obj->binSearchLeftBound($data2,3);
//echo "left index = ".$res.PHP_EOL;


$data2 = [1,2,2,2,3];
$res = $obj->binSearchRightBound($data2,2);
echo "right index = ".$res.PHP_EOL;