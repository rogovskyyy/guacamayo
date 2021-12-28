#!/bin/bash

php -q -S 127.0.0.1:8001 -t ./tests/s1/
php -q -S 127.0.0.1:8002 -t ./tests/s2/
php -q -S 127.0.0.1:8003 -t ./tests/s3/ 
