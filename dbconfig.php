<?php
	$dbServer = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbDatabase = 'appointment';
	
	$db = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>