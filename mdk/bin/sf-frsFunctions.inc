#Uploads files to the new FRS of SF
#uploadFRS <file name with complete path> <release> <category>
uploadFRS()
{
	if [ $# -lt 3 ]
	then
		echo "uploadFRS: Missing parameters"
		echo "uploadFRS <file name with complete path> <release> <category>"
		echo "e.g. uploadFRS /mdk/doc/manual/pdf/m23-manual-de.pdf 2008-09-03 docs"
		echo "Press key to continue"
		read gaga
		exit 42
	fi

	file=$1
	release=$2
	category=$3


	tempDir="/tmp/m23SF-Upload$RANDOM"
	releaseDir="$tempDir/$release"
	mkdir -p "$releaseDir" #e.g. /tmp/m23-manual-de-2008-09-03
	#link the file to the temporary dir
	ln -s "$file" "$releaseDir"

	rsync --bwlimit=55 -vPyrL -e ssh "$releaseDir" "hhabermann,m23@frs.sourceforge.net:/home/frs/project/m/m2/m23/$category"
	rm -r "$tempDir"
}