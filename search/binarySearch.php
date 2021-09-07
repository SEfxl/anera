<?php
/**
 * @Desc:
 * @Author
 * @Time:  5:53 下午
 */


class binarySearch
{
    /**
     * 二分查找
     * @param $data
     * @param $target
     *
     * @return int
     */
    public function binSearch($data, $target) {

        $length = count($data);
        $left = 0;
        $right = $length - 1;

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

        return -1;

    }

    /**
     *搜索目标值的最左边界,不断收缩右侧边界
     *
     * @param $data
     * @param $target
     *
     * @return int
     */
    public function binSearchLeft($data, $target) {

        $length = count($data);
        $left = 0;
        $right = $length -1;

        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if($data[$mid] == $target) {
              $right = $mid-1;
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

    /**
     *搜索目标值的最右边界,不断收缩左侧边界
     *
     * @param $data
     * @param $target
     *
     * @return int
     */
    public function binSearchRight($data, $target) {

        $length = count($data);
        $left = 0;
        $right = $length - 1;

        while ($left <= $right) {

            $mid = $left + intval(($right - $left) / 2);

            if($data[$mid] == $target) {
                $left = $mid + 1;
            } elseif ($target > $data[$mid]) {
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


$obj = new binarySearch();

//$data = [1,2,3,4,5,6,7,8,9];
//$result = $obj->binSearch($data,1);
//echo "search result: ".$result.PHP_EOL;

//$data2 = [1,2,2,2,3];
//$res = $obj->binSearchLeft($data2,1);
//echo "left index = ".$res.PHP_EOL;

$data2 = [1,2,2,2,3];
$res = $obj->binSearchRight($data2,2);
echo "right index = ".$res.PHP_EOL;