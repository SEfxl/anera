<?php
/**
 * @Desc:
 * @Author
 * @Time:  4:45 下午
 */

class other {

    const BEER_PRICE =  2; //价格
    const GAI_PRICE = 4; //盖子
    const KONG_PING_PRICE = 2; //空瓶


    /**
     * 2块一瓶 4个盖换1瓶 2空瓶换1瓶 10块可以喝几瓶
     * @param $money
     */
    public function beerCapNum($money) {
        $gaiNum = 0;
        $kongNum= 0;
        $count = 0;

        $m = 0; //钱买
        $g = 0; //盖子换
        $k = 0; //空瓶
        while ($money >= self::BEER_PRICE || $gaiNum >= self::GAI_PRICE || $kongNum >= self::KONG_PING_PRICE ) {

            while ($money >= self::BEER_PRICE) {
                $money -= self::BEER_PRICE;
                $gaiNum++;
                $kongNum++;
                $count++;
                $m++;
            }

            while ($gaiNum >= self::GAI_PRICE) {
                $gaiNum -= self::GAI_PRICE;
                $gaiNum++;
                $kongNum++;
                $count++;
                $g++;
            }

            while ($kongNum >= self::KONG_PING_PRICE) {
                $kongNum -= self::KONG_PING_PRICE;
                $gaiNum++;
                $kongNum++;
                $count++;
                $k++;
            }
        }

        echo '买了:'.$m.'个, '.'盖子换了:'.$g.'个, 空瓶子换了:'.$k.'个'.PHP_EOL;
        echo '剩余money：'.$money.' , 剩余空瓶：'.$kongNum.' ,剩余瓶盖：'.$gaiNum.PHP_EOL;

    }



    /**
     * 猴子吃桃--求第一天摘了几个桃子
     */
    public function monkeyEatPeach() {
        $day = 9;
        $last = 1;
        while ($day > 0) {
            $dayAll = ($last + 1) * 2;
            $last = $dayAll;
            $day--;
        }
        echo $last.PHP_EOL;
    }


}

$obj = new other();
//$obj->monkeyEatPeach();
$obj->beerCapNum(10);