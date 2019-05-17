<?php
    //交换数组元素
    function swap(&$array,$i,$j){
        $temp=$array[$i];
        $array[$i]=$array[$j];
        $array[$j]=$temp;
    }
    //冒泡排序
    function bubbleSort($array){
        if(count($array)<=1)  return $array;
        $flag= true;
        for($i=0;$i<count($array) && $flag;$i++){
            for($j=count($array)-1;$j>$i;$j--){
                $flag =false;
                if($array[$j]<$array[$j-1]){
                    $flag =true;
                    swap($array,$j,$j-1);
                }
            }
        }
        return $array;
    }
    //选择排序
    function selectSort($array){

        if(count($array)<=1)  return $array;
        for($i=0;$i<count($array);$i++){
            $min=$i;
            for($j=$i+1;$j<count($array);$j++){
                if($array[$min]>$array[$j]){
                    $min=$j;
                }
            }
            if($i !=$min){
                swap($array,$i,$min);
            }

        }
        return $array;
    }
    //插入排序
    function insertSort($array){

        if(count($array)<=1)  return $array;

        for($i=1;$i<count($array);$i++){
            $temp =$array[$i];
            for($j=$i-1;$j>=0;$j--){
                if($temp < $array[$j]){
                    $array[$j+1]=$array[$j];
                    $array[$j] =$temp;
                }else{
                    break;
                }
            }
        }
        return $array;
    }
    //快速排序 1 取巧版
    function quickSort1($array){
        if(count($array)<=1)  return $array;
        $leftArr=[];
        $rightArr=[];
        $mid =$array[0];
        for($i=0;$i<count($array);$i++){
            if($array[$i] < $mid){
                $leftArr[]=$array[$i];
            }
            if($array[$i] > $mid){
                $rightArr[] =$array[$i];
            }
        }
        $leftArr=quickSort1($leftArr);
        $rightArr=quickSort1($rightArr);

        return array_merge($leftArr, array($mid), $rightArr);
    }
    //插入排序，比较交换
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
    //归并排序
    function mergeSort(&$array,$left,$right){
        if($left < $right){
            $mid = floor(($left+$right)/2);
            mergeSort($array,$left,$mid);
            mergeSort($array,$mid+1,$right);
            $i =$left;
            $j =$mid+1;
            $t=0;
            $tmp=[];
            while($i<=$mid && $j<=$right){
                if($array[$i] <= $array[$j]){
                    $tmp[$t++]=$array[$i++];
                }else{
                    $tmp[$t++]=$array[$j++];
                }
            }
            while($i<=$mid){
                $tmp[$t++]=$array[$i++];
            }
            while($j<=$right){
                $tmp[$t++]=$array[$j++];
            }
            $t=0;
            while($left<=$right){
                $array[$left++]=$tmp[$t++];
            }
        }
    }

