#!/bin/bash

# Script for checking the different implementations of m23HSAdmin, if all functions are included in all implementations

cd /m23/data+scripts/distr/halfSister

# Generate a list with all halfSister functions (without backup files
ls m23HSAdmin-* | grep -v '~$' | xargs cat | grep '()$' | grep -v '^function ' | grep -v '^int' | grep '^[a-zA-Z]' | sort -u > /tmp/allHSFunctions

# Run thru all m23HSAdmin files
for hsadminfile in $(ls m23HSAdmin-* | grep -v '~$')
do
	echo
	echo "$hsadminfile"
	for fct in $(cat /tmp/allHSFunctions)
	do
		if [ $(grep -c $fct $hsadminfile) -eq 0 ]
		then
			echo "ERROR: \"$fct\" is missing in \"$hsadminfile\""
		fi
	done
	echo
done

rm /tmp/allHSFunctions
