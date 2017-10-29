#!/bin/sh
pid=`cat pid.server`
echo "Stop Server Process Id:$pid"
kill $pid
rm -f pid.server
