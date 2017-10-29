${java.bin}  -Dfile.encoding=utf-8 -cp ../lib/log4j-1.2.11.jar:../lib/bsh-2.0b4.jar:../lib/mysql-5.1.6.jar:../lib/dom4j-1.6.1.jar:../lib/jaxen-1.1.1.jar:../lib/bcprov-jdk16-145.jar:../lib/commons-io-2.0.1.jar:../lib/commons-lang-2.5.jar:../lib/javapns-jdk16-163.jar:../lib/youkia.zip:../lib/servlet-api-3.0.jar:../lib/groovy-all-1.8.0.jar:../lib/zsg.zip:../src/. zmyth.xlib.Start start.server.cfg >../log/server.log 2>>../log/server.log &
pid=$!
echo "$pid" > pid.server
echo "Sever Process Id:$pid"
