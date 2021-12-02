#!/bin/bash

php -S 127.0.0.1:8001 -t ./test_server_1 -q
php -S 127.0.0.1:8002 -t ./test_server_2 -q
php -S 127.0.0.1:8003 -t ./test_server_3 -q
