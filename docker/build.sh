#!/bin/bash
DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
for d in */ ; do
    if [[ $d != _* ]];
    then
        cd $DIR/$d
        echo "----build $d----"
        docker build -t project/"${d%?}" .
    fi
done

docker pull selenium/standalone-chrome