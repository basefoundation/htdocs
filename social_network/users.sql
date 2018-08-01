SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone="+05:30";
CREATE TABLE IF NOT EXISTS 'users' (
'id' int(11) NOT NULL AUTO_INCREMENT,
'username' varchar(255) NOT NULL,
'first_name' varchar(255) NOT NULL,
'last_name' varchar(255) NOT NULL,
'email' varchar(255) NOT NULL,
'password' varchar(32) NOT NULL,
'sign_up_date' date NOT NULL,
'activated' enum('0','1') NOT NULL,
PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT
=1;
<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>