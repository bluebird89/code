
#include <stdio.h>
#include <sys/inotify.h>
#include <unistd.h>
#include <strings.h>
#define BUF_SIZE 100000

int main(int argc, char **argv) {
    int inotify_fd;
    int inotify_watch_fd;
    int read_buf_length;
    char * file_path = "./api.log";
    char buffer[BUF_SIZE];
    char * p;
    struct inotify_event * single_inotify_event;
    // 第一步：init一下咯...bzero()是为了清空一下内存，保证无脏数据
    bzero(buffer, BUF_SIZE);
    inotify_fd = inotify_init();
    if (-1 == inotify_fd) {
        printf("inotify-init-error");
        return -1;
    }
    // 第二步：添加watch，将要监控的文件或者目录搞进来，最后一个参数是要监控的事件类型
    /*
       注意最后一个参数，是一个mask。他有如下几个数值：
       IN_OPEN 就是打开文件被监控到了
       IN_CLOSE_WRITE 打开文件、写文件、关闭
       IN_CLOSE_NOWRITE  打开文件，看了看，啥也没干关闭了
       IN_MODIFY   文件被改动了
       IN_DELETE  被unlink删除了...
       太多了，所有情况看下面程序demo
    */
    inotify_watch_fd = inotify_add_watch(inotify_fd, file_path, IN_ALL_EVENTS);
    if (-1 == inotify_watch_fd) {
        printf("inotify-watch-error");
        return -1;
    }
    // 第三步：loop起来。有人会说：你这个loop不也是打桩机吗？
    // 但是这个打桩机至少是半自动打桩机。它只有文件状态真的发生变化时候才会打桩
    // 一句话：老打桩机打桩是为了发现文件状态变化，新打桩机是发了变化后才会打桩
    while(1) {
        //printf("in while-loop pre\r\n");
        // 默认情况下，read会被阻塞起来，一直到从inotify-fd中读取到变化并存储d到buffer中去
        // 读取到的内容：就是下面event结构体，可能会有好几个
        /*
         struct inotify_event {
               int      wd;       // watch文件描述符
               uint32_t mask;    // 所发生变化的mask数值
               uint32_t cookie;  // 据文档说当下只有监控目录，发生move-from和move-to的时候，用于串联事件使用，其他概况一般默认都是0
               uint32_t len;     // 👇name的长度
               char     name[];  // 只有监控目录变化时候，目录中新增文件等name就会有数值了
         };
        */
        read_buf_length = read(inotify_fd, buffer, BUF_SIZE);
        //printf("in while-loop | read_length = %d\r\n", read_buf_length);
        if (-1 == read_buf_length) {
            printf("read-error");
            continue;
        }
        for (p = buffer; p < buffer+read_buf_length;) {
            single_inotify_event = (struct inotify_event *)p;

            printf("wd = %2d, name=%s\r\n", single_inotify_event->wd, single_inotify_event->name);
            /*
             截止到目前为止，还有很多人不明白这种用mask实现类似于开关或者
             配置的好处和优势，包括原理...
             */
            if (single_inotify_event->mask & IN_ACCESS) {
                printf("in-access\r\n");
            }
            if (single_inotify_event->mask & IN_ATTRIB) {
                printf("in-attrib\r\n");
            }
            if (single_inotify_event->mask & IN_CREATE) {
                printf("in-create\r\n");
            }
            if (single_inotify_event->mask & IN_MODIFY) {
                printf("in-modify\r\n");
            }
            if (single_inotify_event->mask & IN_OPEN) {
                printf("in-open\r\n");
            }
            if (single_inotify_event->mask & IN_CLOSE_WRITE) {
                printf("in-close-write\r\n");
            }
            if (single_inotify_event->mask & IN_CLOSE_NOWRITE) {
                printf("in-close-nowrite\r\n");
            }
            if (single_inotify_event->mask & IN_MOVE_SELF) {
                printf("in-move-self\r\n");
            }
            if (single_inotify_event->mask & IN_MOVED_FROM) {
                printf("in-moved-from\r\n");
            }
            if (single_inotify_event->mask & IN_MOVED_TO) {
                printf("in-move-to\r\n");
            }
            if (single_inotify_event->mask & IN_IGNORED) {
                printf("in-IGNORED\r\n");
            }
            if (single_inotify_event->mask & IN_DELETE) {
                printf("in-delete\r\n");
            }
            if (single_inotify_event->mask & IN_DELETE_SELF) {
                printf("in-delete-self\r\n");
            }
            /*
            下面这行有个难点需要注意：就是buffer中这一连串的inotify_event，读第一个后，如何读出第二个？
            界定一个inotify_event结构体的长度是：sizeof(struct inotify_event) + single_inotify_event->len
            不要忘记了inotify_event结构体中有一个成员是name，是char[]，他的长度用另一个成员len可以获取到
            所以，这就是在buffer中界定一个inotfiy_event边界的办法
            能界定边界了，程序就可以读完buffer中所有的event了

            那么问题又来了，这个buffer应该定成多长呢？因为name长度是不定长的，所以有一种鸡贼的办法：
            (sizeof(struct inotify_event) + NAME_MAX + 1) * 事件数量（最多十来个）
            结构体本身c长度 加上 NAME_MAX常量（表示文件名最大长度），再加上1是末尾的'\0'长度
            由于一个文件上所能发生的inotify事件数量是有上限的，所以不要手软，直接写s上限最大数值
            所以这样的buffer，是一定足够盛放所有event结构体了
             */
            p += (sizeof(struct inotify_event) + single_inotify_event->len);
        }
        printf("--- one-loop-end ---\r\n\r\n\r\n");
    }
}
