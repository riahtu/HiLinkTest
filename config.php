<?php
$host = 'hilinkdb01.database.windows.net';
$dbname = 'HiLinkDB01';
$dbuser = 'admin-hilink';
$dbpassword = 'W3lcome2HL';

try{
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", "$dbuser", "$dbpassword");
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
	echo "Connection Error :".$ex->getMessage();
}
?>