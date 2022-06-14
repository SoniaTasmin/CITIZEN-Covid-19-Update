<?php 
// DB credentials.
//$servername="localhost";
//$username="root";
//$password="";
//$dname="bbdms";
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','bbdms');
 //Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
//$conn=new PDO("mysql:host=$servername;dbname=bbdms", $username, $password);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>