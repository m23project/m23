#!/bin/sh

poolName=$1
poolDir="/m23/data+scripts/pool/"

if [ ! -d "$poolDir/$poolName" ]
then
	echo "Pool named \"$poolName\" not found!"
	exit 1
fi

cd $poolDir
tar cfvj /mdk/server/iso/poolarchives/$poolName.tar.bz2 $poolDir/$poolName/*.m23pool $poolDir/$poolName/pool $poolDir/$poolName/dists