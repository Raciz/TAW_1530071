#!/bin/bash

echo "Introduzca el nombre del commit: "
read coment

git init
git add .
git commit -m "$comment"
push -u taw master
