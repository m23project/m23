#!/bin/bash

# Get the user parameter to call MySQL/MariaDB CLI tools

echo -n '-u'
grep "^user" /etc/mysql/debian.cnf | tr -d '[:blank:]' | cut -d'=' -f2 | head -1