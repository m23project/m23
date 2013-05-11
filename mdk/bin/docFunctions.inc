. /mdk/bin/sf-frsFunctions.inc
# uploadHtml /mdk/doc/manual/ /home/groups/m/m2/m23/htdocs/docs/manual/
#Compresses and uploads a html directory to SF
uploadHtml()
{
	#source directory that contains the html directory
	srcDir=$1
	#where to upload the html directory
	destDir=$2
	pwd=`pwd`

	cd $srcDir
	echo -n "Compressing HTML files..."
	tar cfj /tmp/html.tb2 html
	echo " done"
	echo -n "Transfering compressed HTML files..."
	scp /tmp/html.tb2 hhabermann@web.sf.net:$destDir
	echo " done"
	echo -n "Extracting HTML files on SF server..."
	ssh hhabermann,m23@shell.sf.net create
	ssh hhabermann,m23@shell.sf.net "cd $destDir; rm -r html; tar xfj html.tb2; rm html.tb2; chmod 777 html -R"
	echo " done"
	cd $pwd
}





#Uploads single PDF files to the doc "directory" in the m23 SF file release system.
uploadPDFFRS()
{
	file=$1 #e.g. /mdk/doc/manual/pdf/m23-manual-de.pdf
	release=`date +%Y-%m-%d` #e.g. 2008-09-03

	uploadFRS $file $release docs
}
