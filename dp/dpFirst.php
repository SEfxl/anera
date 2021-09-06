<?php
/**
 * @Desc:
 * @Date: ${DATA}
 * @Time: 7:57 下午
 */


class DpFirst
{

    public static $memo = [];
    public static $dp = [];
    public static $book = [];

    /**
     * 斐波那契数列
     * @param $n
     * @return int|mixed
     */
    public function fib( $n )
    {

        if ($n == 1 || $n == 2) {
            return 1;
        }

        if (self::$memo[$n] != 0) {
            return self::$memo[$n];
        }

        self::$memo[$n] = $this->fib($n - 1) + $this->fib($n - 2);
        return self::$memo[$n];
    }

    /**
     * dp[i]:当金额为i时需要dp[i]个硬币
     * @param $coins
     * @param $amount
     * @return int|mixed
     */
    public function coinChange( $coins, $amount )
    {

        $coinLength = count($coins);
        for ($i = 0; $i <= $amount; $i++) {
            self::$dp[$i] = PHP_INT_MAX;
        }


        self::$dp[0] = 0;
        for ($i = 1; $i <= $amount; $i++) {
            for ($j = 0; $j < $coinLength; $j++) {
                if ($coins[$j] > $i) {
                    continue;
                }
                self::$dp[$i] = min(self::$dp[$i], 1 + self::$dp[$i - $coins[$j]]);
            }

        }

        //for ($i = 1; $i <= $amount; $i++) {
        //    echo self::$dp[$i] . ' ';
        //}
        //echo PHP_EOL;

        return (self::$dp[$amount] == PHP_INT_MAX) ? -1 : self::$dp[$amount];

    }

    /**
     * book[i][j] 表示s1[0...i]和s2[0...j]的最小编辑距离
     * @param $s1
     * @param $s2
     * @return mixed
     */
    public function editDistance( $s1, $s2 ) {

        $s1Len = strlen($s1);
        $s2Len = strlen($s2);

        for ($i = 1; $i <= $s1Len; $i++) {
            self::$book[$i][] = $i;
        }
        for ($j = 1; $j <= $s2Len; $j++) {
            self::$book[][$j] = $j;
        }
        self::$book[0][0] = 0;

        for ($i = 1; $i <= $s1Len; $i++) {
            for ($j = 1; $j <= $s2Len; $j++) {
                if ($s1[$i - 1] == $s2[$j - 1]) {
                    self::$book[$i][$j] = self::$book[$i - 1][$j - 1];
                } else {
                    self::$book[$i][$j] = min(self::$book[$i - 1][$j] + 1, self::$book[$i][$j - 1] + 1, self::$book[$i - 1][$j - 1] + 1);
                }

            }
        }
        for ($i = 1; $i <= $s1Len; $i++) {
            for ($j = 1; $j <= $s2Len; $j++) {
                echo self::$book[$i][$j] . " ";
            }
            echo PHP_EOL;
        }


        return self::$book[$s1Len][$s2Len];
    }

}

$obj = new DpFirst();

//echo "斐波那契数列 fib(7)=".$obj->fib(7).PHP_EOL;

$coins = [1, 2, 5];
$amount = 11;
//echo "凑硬币: ".$obj->coinChange($coins, $amount).PHP_EOL;

$s1 = "horse";
$s2 = "ros";
echo "编辑距离：" . $obj->editDistance($s1, $s2) . PHP_EOL;