<?php
/**
 * @Desc:
 * @Author
 * @Time:  2:17 下午
 */

error_reporting(E_ALL || ~E_NOTICE);

class window
{
    /**
     * 最小覆盖子串:在字符串s中找出包含t所有字母的最小子串
     * @param $s
     * @param $t
     * @return bool|string
     */
    public function minCoverSubStr( $s, $t ) {

        $sourceLen = strlen($s);
        $targetLen = strlen($t);

        $window = [];
        $need = [];

        for ($i = 0; $i < $targetLen; $i++) {
            $need[$t[$i]]++;
        }
        $elemLen  = count($need);

        $left = $right = 0;

        $valid = 0;
        $start = 0;
        $len = PHP_INT_MAX;

        while ($right < $sourceLen) {
            $c = $s[$right];
            $right++; //窗口右移
            if(isset($need[$c])) { //窗口数据更新
                $window[$c]++;
                if($window[$c] == $need[$c]) {
                    $valid++;
                }
            }

            while ($valid == $elemLen) {
                if($right - $left < $len) {
                    $len = $right - $left;
                    $start = $left;
                }
                $d = $s[$left];
                $left++;
                if(isset($need[$d])) {
                    if($window[$d] == $need[$d]) {
                        $valid--;
                    }
                    $window[$d]--;
                }
            }
        }

        if($len == PHP_INT_MAX) {
            return '';
        } else {
            return substr($s,$start,$len);
        }

    }

    /**
     * 字符串排列:给定两个字符串s1和s2,写一个函数来判断s2是否包含s1的全排列
     * @param $s
     * @param $t
     * @return bool
     */
    public function checkIsPaiLie($s, $t) {

        $targetLen = strlen($t);
        $sourceLen = strlen($s);

        $need = [];
        $window = [];
        for ($i = 0; $i < $targetLen; $i++) {
            $need[$t[$i]]++;
        }

        $elemLen = count($need);

        $left = $right = 0;

        $valid = 0;
        $start = 0;
        $len = PHP_INT_MAX;

        while ($right < $sourceLen) {

            $c = $s[$right];
            $right++;

            if(isset($need[$c])) {
                $window[$c]++;
                if($window[$c] == $need[$c]) {
                    $valid++;
                }
            }

            if($right - $left == $targetLen) { //窗口数据和目标串大小一致时

                if($valid == $elemLen) { //找到合法子串
                    return true;
                }

                $d = $s[$left];
                $left++;
                if(isset($need[$d])) {
                    if($need[$d] == $window[$d]) {
                        $valid--;
                    }
                    $window[$d]--;
                }
            }
        }
        return false;
    }


    /**
     * 字母异位词：给定一个字符串s和一个非空字符串p,找到s中所有是p的字母异位词的子串,返回起始索引
     * @param $s
     * @param $t
     * @return array
     */
    public function getDiffPos( $s, $t ) {

        $sourceLen = strlen($s);
        $targetLen = strlen($t);

        $need = [];
        $window = [];
        for ($i = 0; $i < $targetLen; $i++) {
            $need[$t[$i]]++;
        }

        $elemLen = count($need);

        $left = $right = 0;
        $valid = 0;
        $result = [];

        while ($right < $sourceLen) {
            $c = $s[$right];
            $right++;
            if(isset($need[$c])) {
                $window[$c]++;
                if($window[$c] == $need[$c]) {
                    $valid++;
                }
            }
            while($right - $left >= $targetLen) {
                if($valid == $elemLen) {
                    $result[] = $left;
                }
                $d = $s[$left];
                $left++;

                if(isset($need[$d])) {
                    if($window[$d] == $need[$d]) {
                        $valid--;
                    }
                    $window[$d]--;
                }
            }

        }
        return $result;
    }


    /**
     * 最长无重复子串
     * @param $s
     * @return bool|string
     */
    public function getLongestNoRepeatSubStr( $s ) {
        $left = $right = 0;
        $sourceLength =  strlen($s);
        $window = [];
        $length = PHP_INT_MIN;
        $start = 0;

        while ($right < $sourceLength) {
            $c = $s[$right];
            $right++;
            $window[$c]++;

            while ($window[$c] > 1) {
                $d = $s[$left];
                $window[$d]--;
                $left++;
            }
            if($right - $left > $length) {
                $length = $right - $left;
                $start = $left;
            }
        }

        return substr($s,$start,$length);

    }

    public function noRepeatSubStr($s) {
        $length = strlen($s);
        if($length == 0) {return false;}

        $left = 0;$right = 0;
        $window = [];
        $start = 0;
        $len = PHP_INT_MIN;

        while ($right < $length) {
            $c = $s[$right];
            $right++;
            $window[$c]++;

            while($window[$c] > 1) {
                $d = $s[$left];
                $window[$d]--;
                $left++;
            }

            if($right - $left > $len) {
                $start = $left;
                $len = $right - $left;

            }
        }

        echo $s.' '.$start.' '.$len.PHP_EOL;

        return substr($s,$start,$len);


    }


}

$obj = new window();
//$s = 'ADOBECCODEBANC';
//$t = 'ABC';
//echo $obj->minCoverSubStr($s, $t) . PHP_EOL;

//$s = "eidbaooo";
//$s = "eidboaoo";
//$t = "ab";
//$res = $obj->checkIsPaiLie($s,$t);
//if($res) {
//    echo "匹配OK".PHP_EOL;
//}else {
//    echo "匹配不OK".PHP_EOL;
//}

//$s = "cbaebabacd";
//$t = "abc";
//$res = $obj->getDiffPos($s,$t);
//foreach ($res ?:[] as $v) {
//    echo $v.' ';
//}
//echo PHP_EOL;

//$s = "abcabcbb";
//$s = "bbbbb";
$s = "pwwkew";
//$len = $obj->getLongestNoRepeatSubStr($s);
//echo $len.PHP_EOL;

$len = $obj->noRepeatSubStr($s);
echo $len.PHP_EOL;