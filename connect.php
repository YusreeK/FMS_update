<?php
$mysqli = new mysqli("localhost", "root",
"wawasan", "Soccer");
if ($mysqli->connect_errno) {
printf("%s:%s", $mysqli->connect_errno, $mysqli->connect_error);
} 
?>