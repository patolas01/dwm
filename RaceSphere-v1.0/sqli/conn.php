<?php

$host="localhost";
$database="racesphere";
$user="root";
$pass="";
$conn = new mysqli($host, $user, $pass, $database);
$conn->set_charset("utf8");
if ($conn->connect_errno) {
echo "Failed to connect to MySQL: ".$conn->connect_error;
exit();
}

?>