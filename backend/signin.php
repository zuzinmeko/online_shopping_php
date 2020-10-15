<?php 
session_start();
include 'dbconnect.php';

$email=$_POST['email'];
$password=sha1($_POST['password']);

//echo "$email and $password";

$sql="SELECT users.*,roles.name as role_name FROM users  INNER JOIN models_has_roles ON users.id=models_has_roles.user_id INNER JOIN roles ON models_has_roles.role_id=roles.id  WHERE email=:user_email AND password=:user_password";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':user_email',$email);
$stmt->bindParam(':user_password',$password);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);

// var_dump($data);
// die();


if ($data) {
	$_SESSION['loginuser']=$data;
	if ($_SESSION['loginuser']) {
		header("location:index.php");
	}else{
		header("location:login.php");
	}
}else{
	header("location:login.php");

}
 ?>