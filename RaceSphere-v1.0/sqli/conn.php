<?php

$host="localhost";
$database="racesphere";
$user="root";
$pass="";
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_errno) {
echo "Failed to connect to MySQL: ".$conn->connect_error;
exit();
}

?>