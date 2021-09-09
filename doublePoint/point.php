<?php
/**
 * @Desc:
 * @Author
 * @Time:  11:02 上午
 */


class point
{
    /**
     * 删除数组中的重复项
     * @param $data
     * @return int
     */
    public function orderArray( $data ) {

        $length = count($data);
        if ($length == 0) {
            return 0;
        }
        $slow = $fast = 0;
        while ($fast < $length) {
            if ($data[$slow] != $data[$fast]) {
                $slow++;
                $data[$slow] = $data[$fast];
            }
            $fast++;

        }
        foreach ($data as $v) {
            echo $v . ' ';
        }
        echo PHP_EOL;
        echo ($slow + 1) . PHP_EOL;
    }

    /**
     * 原地移除数组$data中值等于$val的元素
     * @param $data
     * @param $val
     * @return int
     */
    public function delElem( $data, $val ) {
        $length = count($data);
        if ($length == 0) {
            return 0;
        }
        $slow = $fast = 0;
        while ($fast < $length) {
            if ($data[$fast] != $val) {
                $data[$slow] = $data[$fast];
                $slow++;
            }
            $fast++;
        }
        for ($i = 0; $i < $slow; $i++) {
            echo $data[$i] . ' ';
        }
        echo PHP_EOL;

    }

    /**
     * 将值为0的元素移动到数组末尾
     * @param $data
     * @return int
     */
    public function moveZeroElem($data) {

        $length = count($data);
        if($length == 0) {
            return 0;
        }

        $slow = $fast = 0;
        while ($fast != $length) {
            if($data[$fast] != 0) {
                $data[$slow] = $data[$fast];
                $slow++;
            }
            $fast++;
        }

        for ($i=$slow;$i<$length;$i++) {
            $data[$i] = 0;
        }

        for ($i=0;$i<$length;$i++) {
            echo $data[$i].' ';
        }
        echo PHP_EOL;

    }

}

$obj = new point();
//$data = [1, 1, 2];
//$data = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
//$obj->orderArray($data);

//$data = [3, 2, 2, 3];   $val = 3;
//$data = [0,1,2,2,3,0,4,2];   $val = 2;
//$obj->delElem($data, $val);

$data = [0,1,4,0,2];
$obj->moveZeroElem($data);