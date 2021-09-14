<?php
/**
 * @Desc:
 * @Author
 * @Time:  4:52 下午
 */


class nSum
{
    public function twoSum2( $nums, $target ) {

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


    public function twoSum($nums, $l, $target) {
        //sort($nums);
        $left = $l;
        $right = count($nums) - 1;

        $result = [];
        while ($left <= $right) {
            $low = $nums[$left];
            $high = $nums[$right];

            $sum = $nums[$left] + $nums[$right];
            if($sum == $target) {
                $result[] = [$nums[$left],$nums[$right]];
                while ($left <= $right && $low == $nums[$left]) {
                    $left++;
                }

                while ($left <= $right && $high == $nums[$high]) {
                    $right--;
                }

            } elseif($sum > $target) {
                $right--;
            } elseif($sum < $target) {
                $left++;
            }
        }
        return $result;
    }

    public function threeSum($nums,$target) {
        sort($nums);
        $right = count($nums) - 1;

        $result = [];
        for ($i = 0; $i <= $right; $i++) {
            $twoRes = $this->twoSum($nums,$i+1,$target-$nums[$i]);
            foreach ($twoRes as $item) {
                $result[] = [$i,$item[0],$item[1]];
            }
        }
    }

}

$obj = new nSum();

//$data = [5,3,1,6]; $target = 9;
//$data = [1,3,1,2,2,3]; $target = 4;
//$result = $obj->twoSum2($data,$target);
//foreach ($result ?:[] as $v) {
//    echo '['.$v[0].','.$v[1].']'.' ';
//}
//echo PHP_EOL;


//$data = [1,3,1,2,2,3]; $target = 4;
//$obj->twoSum($data, $target);

$nums = [-1,0,1,2,1,-4]; $target = 0;
$obj->threeSum($nums,$target);
