#!/bin/sh

for FILE in $(ls src/*.php)
do
	echo "linting $FILE"
	php -l "$FILE"
done
