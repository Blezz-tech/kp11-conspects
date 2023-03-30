#!/bin/bash

mkdir logs

host="localhost:8080"

path=$(date +"../logs/%Y-%m-%d %H:%M:%S.log")

cd ./src

php -S ${host} &>> "${path}"
