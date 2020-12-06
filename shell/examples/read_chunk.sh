#!/bin/bash

BUCKET=tubitv-awesome-logs

PREFIX=${1:-20171111}

trap ctrl_c INT

function ctrl_c() {

  echo "** User stopped the process with CTRL-C"

  exit $?

}

for key in `aws s3api list-objects --bucket $BUCKET --prefix $PREFIX | jq -r '.Contents[].Key'`

do

  sleep 1

  aws s3 cp s3://$BUCKET/$key - | gunzip -c | log_parser

done
