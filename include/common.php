<?php
$con = mysqli_connect("localhost", "root", "", "lifestylestore") or die(mysqli_error($con));

if (!isset($_SESSION['email'])) {
	session_start();
}
?>