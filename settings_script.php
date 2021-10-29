<?php
	require ("includes/common.php");

	if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$password1 = $_POST['old-password'];
  $password1 = mysqli_real_escape_string($con, $password1);
  $password1 = MD5($password1);

 $password2 = $_POST['new-password'];
  $password2= mysqli_real_escape_string($con, $password2);
  $password2 = MD5($password2);

 $password3= $_POST['repnew-password1'];
  $password3 = mysqli_real_escape_string($con, $password3);
  $password3 = MD5($password3);


$query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);

$password4= $row['password'];


if($password2 != $password3){

	header('location: settings.php?error=The two passwords don\'t match.');

}

else {

			if($password1 == $password4){

				$query = "UPDATE  users SET password = '" . $password3 . "' WHERE email = '" . $_SESSION['email'] . "'";
        		mysqli_query($con, $query) or die($mysqli_error($con));
        		header('location: settings.php?error=Password Updated Successfully');

			}
			else{

				header('location: settings.php?error=Wrong Old Password.');
			}
	}


?>
