<?php
include "db.php";
$username = $_POST['username'];
$pass = $_POST['password'];
$sql = "INSERT INTO user VALUES(null,'".$username."','".$pass."','1.jpg')";
$cn->query($sql);
echo("sadasd");
?>