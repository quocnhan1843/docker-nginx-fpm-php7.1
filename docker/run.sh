#!/bin/bash
DIR=$(pwd)
PROJECT_PATH=$(dirname "$DIR")
REMOTE_HOST='10.0.2.2'

start_up_service='src fpm-7 nginx-7'

docker_compose_file=$DIR'/docker-compose.yaml'

sed "s@%project_path%@$PROJECT_PATH@g; s@%remote_host%@$REMOTE_HOST@g" $docker_compose_file"_" > $docker_compose_file
 

if [[ $1 == "stop" ]]
then
    echo "STOP..."
    docker-compose stop
    docker rm -f $(docker ps -a -q)
    echo "DONE"
elif [[ $1 == "restart" ]]
then
    echo "STOP..."
    docker-compose stop
    docker rm -f $(docker ps -a -q)
    echo "START..."
    docker-compose up -d $start_up_service
    echo "DONE"
elif [[ $1 == "centos" ]]
then
    echo "STOP..."
    docker-compose stop
    docker rm -f $(docker ps -a -q)
    echo "START PHP7 CENTOS 6..."
    docker-compose up -d $start_up_service_centos
    echo "DONE"
else
    echo "START..."
    docker-compose up -d $start_up_service
    echo "DONE"
fi
