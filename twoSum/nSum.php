<?php
/**
 * @Desc:
 * @Author
 * @Time:  4:52 下午
 */


class nSum
{
    public function twoSum( $nums, $target ) {

        sort($nums);
        $length = count($nums);
        $left = 0;
        $right = $length - 1;
        $result = [];

        while ($left < $right) {
            $leftData = $nums[$left];
            $rightData = $nums[$right];
            $sum = $leftData + $rightData;
            if ($sum == $target) {
                $result[] = [$nums[$left], $nums[$right]];
                while ($left < $right && $nums[$left] == $leftData)
                    $left++;

                while ($left < $right && $nums[$right] == $leftData)
                    $right--;

            } else if ($sum > $target) {
                $right--;
            } else {
                $left++;
            }
        }

        foreach ($result ?:[] as $item) {
            echo $item[0].' '.$item[1].PHP_EOL;
        }
        return $result;
    }
}

$obj = new nSum();

//$data = [5,3,1,6];
//var_dump($obj->twoSum($data,9));

$data = [1,3,1,2,2,3]; $target = 4;
$obj->twoSum($data, $target);
