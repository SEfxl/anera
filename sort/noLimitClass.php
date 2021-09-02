<?php
/**
 * @Desc: 递归构造目录树
 * @Date: ${DATA}
 * @Time: 4:03 下午
 */


$array = [
    ['id' => 1, 'pid' => 0, 'name' => '河北省'],
    ['id' => 2, 'pid' => 0, 'name' => '北京市'],
    ['id' => 3, 'pid' => 1, 'name' => '邯郸市'],
    ['id' => 4, 'pid' => 2, 'name' => '朝阳区'],
    ['id' => 5, 'pid' => 2, 'name' => '通州区'],
    ['id' => 6, 'pid' => 4, 'name' => '望京'],
    ['id' => 7, 'pid' => 4, 'name' => '酒仙桥'],
    ['id' => 8, 'pid' => 3, 'name' => '永年区'],
    ['id' => 9, 'pid' => 1, 'name' => '武安市'],
];


function getTree($array, $pid = 0, $level = 0) {

    static $list = [];
    foreach ($array as $key => $value) {
        if($pid == $value['pid']) {
            $value['level'] = $level;
            $list[] = $value;
            unset($array[$key]);
            //开始递归,查找父ID为该节点ID的节点,级别则为原级别+1
            getTree($array,$value['id'],$level+1);
        }
    }
    return $list;
}

$data = getTree($array);
foreach ($data as $k => $v) {
    echo str_repeat('  ',$v['level']).$v['name'].PHP_EOL;
}

