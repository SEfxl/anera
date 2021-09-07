<?php
/**
 * @Desc:
 * @Author
 * @Time:  2:16 下午
 */


class dpSecond
{
    public static $dp = [];

    public static $memo = [];

    /**
     *  最长上升子序列长度
     * dp[i] 表示以sequence[i]结尾的最长上升子序列的长度
     * @param $sequence
     */
    public function longestIncrSubSequence($sequence) {

        $length = count($sequence);
        for ($i=0;$i<$length;$i++) {
            self::$dp[$i] = 1;
        }

        for ($i=0;$i<$length;$i++) {
            for ($j=0;$j<$i;$j++) {
                if($sequence[$j] < $sequence[$i]) {
                    self::$dp[$i] = max(self::$dp[$i],self::$dp[$j]+1);
                }
            }

        }

        for ($i=0;$i<$length;$i++) {
            echo self::$dp[$i].' ';
        }
        echo PHP_EOL;

        $maxValue = max(self::$dp);
        echo '最长递增子序列的长度: '.$maxValue.PHP_EOL;

    }


    /**
     * 信封嵌套 第一维数组升序排序,第二维数组降序排序
     */
    public function envelopNest() {
        $envelopes = [[5,4],[2,3,],[1,8],[6,7],[5,2],[6,4]];
        $keys = [];
        $values = [];
        foreach ($envelopes as $item) {
            $keys[] = $item[0];
            $values[] = $item[1];
        }
        array_multisort($keys,SORT_ASC,$values,SORT_DESC,$envelopes);

        $sequences = [];
        $num = 0;
        foreach ($envelopes as $item) {
            $num++;
            $sequences[] = $item[1];
        }
        for ($i=0;$i<$num;$i++) {
            self::$dp[$i] = 1;
        }

        for ($i = 0; $i < $num; $i++) {
            for ($j=0;$j<$i;$j++) {
                if($sequences[$i] > $sequences[$j]) {
                    self::$dp[$i] = max(self::$dp[$i], self::$dp[$j] + 1);
                }
            }
        }

        for ($i=0;$i<$num;$i++) {
            echo self::$dp[$i].' ';
        }
        echo PHP_EOL;
        $maxValue = max(self::$dp);

        echo "嵌套数：".$maxValue.PHP_EOL;

    }

    /**
     * 最大连续子数组和
     */
    public function getMaxSubSeqSum() {
        $data = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
        $length = count($data);
        for ($i = 0; $i < $length; $i++) {
            self::$dp[$i] = PHP_INT_MIN;
        }

        self::$dp[0] = $data[0];
        for ($i = 1; $i < $length; $i++) {
            self::$dp[$i] = max($data[$i], self::$dp[$i - 1] + $data[$i]);
        }

        $maxValue = max(self::$dp);
        echo "最大连续子数组和：".$maxValue.PHP_EOL;
        for ($i = 0; $i < $length; $i++) {
            echo self::$dp[$i].' ';
        }
        echo PHP_EOL;


    }

    /**
     * 最长公共子序列长度
     * @param $str1
     * @param $i
     * @param $str2
     * @param $j
     * @return int|mixed
     */
    public function getLongerCommonSubSequence($str1,$i,$str2,$j) {

        if(strlen($str1) == $i || strlen($str2) == $j) {
            return 0;
        }

        if(self::$memo[$i][$j] != -1) {
            return self::$memo[$i][$j];
        }

        if($str1[$i] == $str2[$j]) {
            self::$memo[$i][$j] = 1 + $this->getLongerCommonSubSequence($str1, $i + 1, $str2, $j + 1);
        } else {
            self::$memo[$i][$j] = max($this->getLongerCommonSubSequence($str1, $i + 1, $str2, $j), $this->getLongerCommonSubSequence($str1, $i, $str2, $j + 1));
        }

        return self::$memo[$i][$j];
    }

    public function calc( $str1, $str2 ) {

        $n = strlen($str1);
        $m = strlen($str2);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                self::$memo[$i][$j] = -1;
            }
        }

        return $this->getLongerCommonSubSequence($str1, 0, $str2, 0);

    }

}

$obj = new dpSecond();

$sequence = [10,9,2,5,3,7,101,18];
//$obj->longestIncrSubSequence($sequence);

//$obj->envelopNest();

//$obj->getMaxSubSeqSum();

$str1 = "zabcde";
$str2 = "acez";
echo $obj->calc($str1,$str2).PHP_EOL;

