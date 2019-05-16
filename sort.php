<?php
    function swap(&$array,$i,$j){
        $temp=$array[$i];
        $array[$i]=$array[$j];
        $array[$j]=$temp;
    }
    //冒泡
    function  BubbleSort($array){
        $flag=true;
        for($i=0;$i<count($array) && $flag;$i++){
            $flag=false;
            for($j=count($array)-1;$j>$i;$j--){
                if($array[$j] < $array[$j-1]){
                    swap($array,$j,$j-1);
                    $flag=true;
                }
            }
        }
        return $array;
    }

    //简单选择排序
    function SelectSort($array){
        for($i=0;$i<count($array);$i++){
            $min=$i;
            for($j=$i+1;$j<count($array);$j++){
                if($array[$min]>$array[$j]){
                    $min=$j;
                }
            }
            if($min !=$i){
                swap($array,$min,$i);
            }
        }
        return $array;
    }
   
    //插入排序
    function InsertSort($arr) {
        $len=count($arr);
        for ($i=1; $i < $len; $i++) {
            $tmp = $arr[$i];
            for ($j = $i - 1; $j >= 0; $j--) {
                     if ($tmp < $arr[$j]) {
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                } else {
                    //如果碰到不需要移动的元素
                    //由于是已经排序好是数组，则前面的就不需要再次比较了。
                    break;
                }
            }
        }
        return $arr;
    }

    //快速排序  取巧
    function quick_sort($array){
        // 判断是否需要运行，因下面已拿出一个中间值，这里<=1
        if (count($array) <= 1) {
            return $array;
        }

        $middle = $array[0]; // 中间值
        $left = array(); // 接收小于中间值
        $right = array();// 接收大于中间值

        // 循环比较
        for ($i=1; $i < count($array); $i++) {

            if ($middle < $array[$i]) {
                // 大于中间值
                $right[] = $array[$i];
            } else {
                // 小于中间值
                $left[] = $array[$i];
            }
        }

        // 递归排序划分好的2边
        $left = quick_sort($left);
        $right = quick_sort($right);

        // 合并排序后的数据，别忘了合并中间值
        return array_merge($left, array($middle), $right);
    }
  // 快速排序
function quick_sort_swap(&$array, $start, $end) {
    if($end <= $start) return;
    $key = $array[$start];
    $left = $start;
    $right = $end;
    while($left < $right) {
        while($left < $right && $array[$right] > $key)
            $right--;
        $array[$left] = $array[$right];
        while($left < $right && $array[$left] < $key)
            $left++;
        $array[$right] = $array[$left];
    }
    $array[$right] = $key;
    quick_sort_swap($array, $start, $right - 1);
    quick_sort_swap($array, $right+1, $end);
}
