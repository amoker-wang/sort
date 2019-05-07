<?php
    function swap(&$array,$i,$j){
        $temp=$array[$i];
        $array[$i]=$array[$j];
        $array[$j]=$temp;
    }
    //冒泡 0
    function BubbleSort0($array){
        for($i=0;$i<count($array);$i++){
            for($j=$i+1;$j<count($array);$j++){
                if($array[$i]>$array[$j]){
                    swap($array,$i,$j);
                }
            }
        }
        return $array;
    }

    //冒泡1
    function BubbleSort1($array){
        for($i=0;$i<count($array);$i++){
            for($j=count($array)-1;$j>$i;$j--){
                if($array[$j] < $array[$j-1]){
                    swap($array,$j,$j-1);
                }
            }
        }
        return $array;
    }

    //冒泡2
    function  BubbleSort2($array){
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
                    swap($array,$min,$j);
                    $min=$j;
                }
            }
        }
        return $array;
    }
    //直接插入排序
    function InsertSort($array)
    {
        for ($i = 1; $i < count($array); $i++) {

            if ($array[$i] < $array[$i - 1]) {
                $flag = $array[$i];

                for ($j=$i - 1; $array[$j] > $flag && $j>=0; $j--) {
                    $array[$j + 1] = $array[$j];
                }
                $array[$j + 1] = $flag;
            }
            //echo implode(' ',$array).'<br>';
        }
        return $array;
    }
    //插入排序
    function InsertSort2($arr) {
        //区分 哪部分是已经排序好的
        //哪部分是没有排序的
        //找到其中一个需要排序的元素
        //这个元素 就是从第二个元素开始，到最后一个元素都是这个需要排序的元素
        //利用循环就可以标志出来
        //i循环控制 每次需要插入的元素，一旦需要插入的元素控制好了，
        //间接已经将数组分成了2部分，下标小于当前的（左边的），是排序好的序列
        $len=count($arr);
        for ($i=1; $i < $len; $i++) {
            //获得当前需要比较的元素值。
            $tmp = $arr[$i];
            //内层循环控制 比较 并 插入
            for ($j = $i - 1; $j >= 0; $j--) {
                //$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素
                if ($tmp < $arr[$j]) {
                    //发现插入的元素要小，交换位置
                    //将后边的元素与前面的元素互换
                    $arr[$j + 1] = $arr[$j];
                    //将前面的数设置为 当前需要交换的数
                    $arr[$j] = $tmp;
                } else {
                    //如果碰到不需要移动的元素
                    //由于是已经排序好是数组，则前面的就不需要再次比较了。
                    break;
                }
            }
        }
        //将这个元素 插入到已经排序好的序列内。
        //返回
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
    //快排 中规中矩
    function quickSortReal($data)
    {
        $size = count($data);
        if($size>1)
        {
            $key = $data[0];
            $i = 0;
            $j = $size-1;
            while($i<$j)
            {
                while($i<$j && $data[$j]>=$key)
                    $j--;
                $data[$i] = $data[$j];
                $data[$j] = $key;//用于交换数值,但是后面又会被覆盖,所以该行代码没有多大意义
                while($i<$j && $data[$i]<=$key)
                    $i++;
                $data[$j] = $data[$i];
                $data[$i] = $key;
            }
            if($i == 0)
                $l = [];
            else
                $l = quickSortReal(array_slice($data,0,$i));
            if($i == $size-1)
                $r = [];
            else
                $r = quickSortReal(array_slice($data,$i+1,$size+1-$i));
            return array_merge($l,[$key],$r);

        }else
            return $data;

    }
    //快速排序 节省内存空间

    function quickSort(&$arr, $start, $end)
    {
        if($start >= $end){
            return ;
        }
        $pivot = partition($arr,$start, $end);
        quickSort($arr, $start, $pivot-1);
        quickSort($arr, $pivot+1, $end);
    }

    function partition(&$arr, $start, $end)
    {
        $pivot = $end;
        $i = $start;
        for($j=$start;$j<$end;$j++){
            if($arr[$j]<$pivot){
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $i++;
            }
        }
        if($arr[$i]> $arr[$pivot]){
            $temp = $arr[$i];
            $arr[$i] = $arr[$pivot];
            $arr[$pivot] = $temp;
        }
        return $i;
    }

    function quick_sort2(&$array, $start, $end) {
        if ($start >= $end) return;
        $mid = $start;
        for ($i = $start + 1; $i <= $end; $i++) {
            if ($array[$i] < $array[$mid]) {
                $mid++;
                $tmp = $array[$i];
                $array[$i] = $array[$mid];
                $array[$mid] = $tmp;
            }
        }
        $tmp = $array[$start];
        $array[$start] = $array[$mid];
        $array[$mid] = $tmp;
        quick_sort2($array, $start, $mid - 1);
        quick_sort2($array, $mid + 1, $end);
    }
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
