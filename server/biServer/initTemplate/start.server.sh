${java.bin} -Dfile.encoding=utf-8 -cp ../lib/log4j-1.2.11.jar:../lib/dom4j-1.6.1.jar:../lib/jaxen-1.1.1.jar:../lib/bsh-2.0b4.jar:../lib/mysql-5.1.6.jar:../lib/zlib.zip:../lib/zmyth.zip:%imlib%:../lib/imlib.zip:../lib/youkia.zip:../lib/seasky.zip:../lib/httpclient-4.0.3.jar:../lib/httpcore-4.0.1.jar:../lib/httpmime-4.0.3.jar:../lib/zsg_bi.zip:../src/. zmyth.xlib.Start start.server.cfg >../log/server.log 2>>../log/server.log &
pid=$!
echo "$pid" > pid.server
echo "Server Process Id:$pid"
