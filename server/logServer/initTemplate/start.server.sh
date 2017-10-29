${java.bin}  -Dfile.encoding=utf-8 -cp ../lib/log4j-1.2.11.jar:../lib/bsh-2.0b4.jar:../lib/mysql-5.1.6.jar:../lib/zlib.zip:../lib/zmyth.zip:../lib/dom4j-1.6.1.jar:../lib/jaxen-1.1.1.jar:../lib/bcprov-jdk16-145.jar:../lib/commons-io-2.0.1.jar:../lib/commons-lang-2.5.jar:../lib/javapns-jdk16-163.jar:../lib/youkia.zip:../lib/jxl.jar:../lib/zsg_log.zip:../src/. zmyth.xlib.Start start.server.cfg >../log/server.log 2>>../log/server.log &
pid=$!
echo "$pid" > pid.server
echo "Server Process Id:$pid"