<?php
    // get image file list
    $image_list = array_merge(glob('../images/*.png'), glob('../images/*.jpg'), glob('../images/*.webp'));

    $fl = '一共有'.count($image_list).'个图形文件<br><br>';
    $n = 1;
    foreach($image_list as $v){
        $fl = $fl.$n.' - '.$v.'<br><br><img width="400" border="0" src=../images/'.$v.'><br><br>';
        $n++;
    }

    echo "var filelist="."'$fl';";
?>
