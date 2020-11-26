<?php
$s_file       = "./api.log";
$i_inotiy_fd = inotify_init();
$i_watch_fd   = inotify_add_watch($i_inotify_fd, $s_file, IN_ALL_EVENTS);

// 将$i_inotify_fd设置为非阻塞IO
// 看过《PHP网络编程》的朋友，不应该对“ 阻塞和非阻塞 ”这个概念这个陌生了
// 当然了，下面这样你可以完全注释掉
// 注释掉：inotify_read就阻塞一直等待有事件发生
// 不注释：inotify_read不会阻塞，会一直打空炮
stream_set_blocking($i_inotify_fd, 0);

while (true) {
    $a_events = inotify_read($i_inotify_fd);
    //sleep(1);
    //print_r($a_events);
    $i_event_length = inotify_queue_len($i_inotify_fd);
    echo $i_event_length.PHP_EOL;
}
