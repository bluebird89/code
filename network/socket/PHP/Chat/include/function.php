<?php
//统计在线人数
function clearDir($dir)
{
    $n = 0;
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file == '.' or $file == '..') {
                continue;
            }
            if (is_file($dir . $file)) {
                $n++;
            }
        }
    }
    closedir($dh);
    return $n;
}

//通知每个学校在线的人

function notice($dir)
{
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file == '.' or $file == '..') {
                continue;
            }
            if (is_file($dir . $file)) {
                $array[]=file_get_contents($dir.$file);
            }
        }
    }
    closedir($dh);
    return $array;
}

//获取聊天记录
function record($file)
{
    if (file_exists(_ROOT_.'/data/'.$file.'.record')) {
        $data=file_get_contents(_ROOT_.'/data/'.$file.'.record');
        $data=explode('#^?*', $data);
        return $data;
    }
}

//写入聊天记录
function addrecord($client, $data)
{
    if (!file_exists(_ROOT_.'/data/'.$client.'.record')) {
        file_put_contents(_ROOT_.'/data/'.$client.'.record', $data.'#^?*');
    } else {
        $file=file_get_contents(_ROOT_.'/data/'.$client.'.record');
        $datas=explode('#^?*', $file);
        if (count($datas)>=120) {
            file_put_contents(_ROOT_.'/data/'.$client.'.record', $data.'#^?*');
        } else {
            file_put_contents(_ROOT_.'/data/'.$client.'.record', $data.'#^?*', FILE_APPEND);
        }
    }
}
