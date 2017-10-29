#!/bin/sh

if [ -z "$1" ]; then
  echo "没有找到参数"
  echo "Usage: sh startup.sh [start|stop|restart]"
  exit 1
fi

# server根目录
SERVER_HOME="/Workspace/webgames/zsg/server"

# 存储PID的文件
PID_FILE="$SERVER_HOME/gameServer/init/pid.server"

# 设置控制台日志
if [ ! -d ""$SERVER_HOME"/gameServer/log" ];
then
  mkdir -p "$SERVER_HOME"/gameServer/log
fi
if [ -z "$START_OUT" ] ; then
  START_OUT="$SERVER_HOME/gameServer/log/server.log"
fi

# 启动
start() {
  # 检查是否已经启动
  if [ -f "$PID_FILE" ]; then
    pid=`cat "$PID_FILE"`
    if [ ! -z "$pid" ]; then
        echo "进程已启动，启动取消"
        exit 1
    fi
  fi

  touch "$START_OUT"

  echo "Using SERVER_HOME:   $SERVER_HOME"
  echo "Using PID_FILE:   $PID_FILE"
  echo "Using START_OUT:   $START_OUT"


  cd $SERVER_HOME/gameServer/init/

  java -Dfile.encoding=utf-8 -cp ../lib/log4j-1.2.11.jar:../lib/bsh-2.0b4.jar:../lib/mysql-5.1.6.jar:../lib/dom4j-1.6.1.jar:../lib/jaxen-1.1.1.jar:../lib/bcprov-jdk16-145.jar:../lib/commons-io-2.0.1.jar:../lib/commons-lang-2.5.jar:../lib/javapns-jdk16-163.jar:../lib/youkia.zip:../lib/servlet-api-3.0.jar:../lib/groovy-all-1.8.0.jar:../lib/zsg.zip:../src/. zmyth.xlib.Start start.server.cfg >> "$START_OUT" 2>&1 &

  # 存储进程Id
  touch "$PID_FILE"
  echo "$!" > "$PID_FILE"
  pid=`cat "$PID_FILE"`
  echo "Server Process Id:$pid"
  echo "start success"
}

# 停止
stop() {
    # 检查是否已经启动
    if [ -f "$PID_FILE" ]; then
       pid=`cat "$PID_FILE"`
       if [ ! -z "$pid" ]; then
          rm -f "$PID_FILE"
          kill -9 "$pid"
          echo "stop success"
          return
       fi
    fi
    echo "没有找到对应进程"
}


# 启动
if [ "$1" = "start" ] ; then
    shift
    start;
elif [ "$1" = "stop" ]; then
    # KILL
    shift
    stop;
elif [ "$1" = "restart" ]; then
    # 重启
    shift
    stop;
    start;
else
  echo "敬请期待"
fi