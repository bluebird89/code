import ssl
import threading as thread
import time

import websocket

count = 5


# 在接收到服务器发送消息时调用
def on_message(ws, message):
    print('Received: ' + message)
    global count
    print(message)
    count -= 1  # 接收了5次消息之后关闭websocket连接
    if count == 0:
        ws.close()


# 在和服务器建立完成连接时调用
def on_open(ws):
    # 线程运行函数
    def gao():
        # 往服务器依次发送0-4，每次发送完休息0.01秒
        for i in range(5):
            time.sleep(0.01)
            msg = "{0}".format(i)
            ws.send(msg)
            print('Sent: ' + msg)
        # 休息1秒用于接收服务器回复的消息
        time.sleep(1)

        # 关闭Websocket的连接
        ws.close()
        print("Websocket closed")

    # 在另一个线程运行gao()函数
    thread.start_new_thread(gao, ())


if __name__ == "__main__":
    # ws = websocket.WebSocketApp("ws://echo.websocket.org/",
    #                             on_message=on_message,
    #                             on_open=on_open)
    ws = websocket.WebSocketApp("wss://api.gemini.com/v1/marketdata/btcusd?top_of_book=true&offers=true",
                                on_message=on_message)
    ws.run_forever(sslopt={"cert_reqs": ssl.CERT_NONE})

    ws.run_forever()
