#!/bin/sh
pid=`cat pid.server`
echo "Stop server Process Id:$pid"
kill $pid
rm -f pid.server
