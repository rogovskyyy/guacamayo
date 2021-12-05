#!/bin/bash

rm -R ./data/rust/backend 2> /dev/null
mkdir ./data/rust/backend

mkdir ./data/rust/backend/src
cp -R ./backend/src ./data/rust/backend/src

mkdir ./data/rust/backend/static
cp -R ./backend/static ./data/rust/backend/static

mkdir ./data/rust/backend/templates
cp -R ./backend/templates ./data/rust/backend/templates

cp ./backend/Cargo.toml ./data/rust/backend
cp ./backend/logo.png ./data/rust/backend
