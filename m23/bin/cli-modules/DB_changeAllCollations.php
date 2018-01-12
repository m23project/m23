<?php
/*
Description: Changes the codepage for the collation of all text fields in all tables of a database to "latin1_general_ci".
*/

function run($argc, $argv)
{
	dbClose();
	dbConnect(DB_getSuperUserName(), DB_getSuperUserPassword());
	DB_changeAllCollations('latin1_general_ci');
}

?>
