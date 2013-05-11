
#adds a line to a textfile if the search pattern could not be found.
#$1: Name of the file to edit
#$2: Regular expression to search the file for
#$3: Line to insert if the regular expression could not be found.
function EDIT_addIfNotExists()
{
file=$1
search=$2
insert=$3

tempFile="/tmp/m23edit$$"

awk -vS="$search" -vA="$insert" '
BEGIN {
cnt=0;
}
{
print($0);
if (match($0,S) > 0)
cnt=1;
}
END {
if (cnt == 0)
	print(A);
}
' "$file" > "$tempFile"

cat "$tempFile" > "$file"
rm "$tempFile"
}

function EDIT_commentOut()
{
file=$1
search=$2
commentOutStr=$3

tempFile="/tmp/m23edit$$"

awk -vS="$search" -vCOS="$commentOutStr" -vORS="" '
{
if (match($0,S) > 0)
	print(COS);
print($0"\n");
}
' "$file" > "$tempFile"

cat "$tempFile" > "$file"
rm "$tempFile"
}