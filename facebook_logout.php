<?php
session_start();
$db = new mysqli("localhost", "root","", "cse152");
$us=$_SESSION['name'];
$sql1=mysqli_query($db,"DELETE FROM `active users` WHERE `name`='$us'");
header("location:facbook_mainpage.php");
session_abort();
?>