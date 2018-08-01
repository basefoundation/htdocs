<?php 
session_start(); 
  include ('nomokedatabase.php');
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $sql = "INSERT INTO user (name, email,  pwd)
  VALUES ('$name','$email','$pwd')";
  $result =  $conn->query($sql);
  header("Location: login1.php");

?>