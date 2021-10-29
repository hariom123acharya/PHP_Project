<?php
require "includes/common.php";

$email = mysqli_real_escape_string($con, $_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password = MD5($password);
$query = "SELECT id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result=mysqli_query($con , $query)or
die(mysqli_error($con));
$num=mysqli_num_rows($result);
if($num==0){
	$error=$$_GET['error'];
	$error="<span class='red'>Enter correct Email and password combination</span>";
	header('location: login.php? error=' .$error);
	
}
else{
	$row=mysqli_fetch_array($result);
	$_SESSION['email']=$row['email'];
	$_SESSION['id']=$row['id'];
	header('location: products.php');
}
?>
