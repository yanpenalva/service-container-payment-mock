#!/usr/bin/env bash

docker run --rm -it \
    -u $(id -u):$(id -g) \
    -v $(pwd):/app \
    -w /app \
    composer:latest "$@"
    
