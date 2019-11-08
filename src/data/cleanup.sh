#!/bin/bash
#
# A simple script to remove column-based line lengths
# (i.e. every line is artificially cut off at 80 characters)
# but preserve empty lines (i.e., a paragraph break)
# 
# This takes one argument: the filename
# Example usage:
# sh cleanup.sh myfile.txt

if [ -z "$1" ]
  then
    echo "ERROR: No file provided. Exiting..."
    exit 1
fi

touch tmp.txt
cat $1 | while read line
do
	# If this is a blank line
	if [ "$line" == "" ]; 
	then
		# Replace empty lines with double newlines
		printf "\n\n" >> tmp.txt
	else
		# Just write the line, as-is, no newlines
    	printf "%s" "$line " >> tmp.txt;  
    fi
done
mv tmp.txt $1