<?php 
	include 'dbconnect.php';
	session_start();

	$name=$_POST['name'];
	$phno=$_POST['phno'];
	
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$address=$_POST['address'];
	
	$photo=$_FILES['photo'];
	$_SESSION['old_name']=$name;
	$_SESSION['old_phno']=$phno;
	$_SESSION['old_email']=$email;
	$_SESSION['old_password']=$password;
	$_SESSION['old_cpassword']=$cpassword;
	$_SESSION['old_address']=$address;

	$basepath="img/users/";
	$fullpath=$basepath.$photo['name'];
	move_uploaded_file($photo['tmp_name'], $fullpath);


	//echo "$name and $price and $discount and $brand and $subcategory and $description and $codeno<br>";
	//print_r($photo);

	if ($name==null || $phno==null||  $email==null || $password==null|| $cpassword==null || $address==null|| $photo['size']==0) {

		if ($photo['size']==0) {
			$_SESSION['profile_error_msg']="User profile is Requried!";
		}
		if ($name==null) {
			$_SESSION['name_error_msg']="User name is Requried!";
		}
		if ($phno==null) {
			$_SESSION['phno_error_msg']="User phno is Requried!";
		}
		if ($address==null) {
			$_SESSION['address_error_msg']="User address is Requried!";
		}
		if ($email==null) {
			$_SESSION['email_error_msg']="User email is Requried!";
		}
		if ($password==null) {
			$_SESSION['password_error_msg']="User password is Requried!";
		}
		if($cpassword==null){
			$_SESSION['cpassword_error_msg']="User cpassword is Requried!";
		}
		header("location:register.php");

		

	}elseif ($password!=$cpassword) {
		$_SESSION['password_error_msg']="Password does not match!";
		header("location:register.php");
	}else{

		$password=sha1($password);
		$sql="INSERT INTO users(name,profile,phone,address,email,password)VALUES(:user_name,:user_profile,:user_phno,:user_address,:user_email,:user_password)";
				$stmt=$pdo->prepare($sql);
				$stmt->bindParam(':user_name',$name);
				$stmt->bindParam(':user_profile',$fullpath);
				$stmt->bindParam(':user_phno',$phno);
				$stmt->bindParam(':user_address',$address);
				$stmt->bindParam(':user_email',$email);
				$stmt->bindParam(':user_password',$password);
	//$stmt->bindParam(':user_cpassword',$cpassword);

				$stmt->execute();

				if($stmt->rowCount()){
					header("location:login.php");
				}else{
					echo "Error";
				}


				$sql="SELECT * FROM users ORDER BY id DESC LIMIT 1";
				$stmt=$pdo->prepare($sql);
				$stmt->execute();
				$user=$stmt->fetch(PDO::FETCH_ASSOC);

				$user_id=$user['id'];
				$role_id=1;

				$sql="INSERT INTO models_has_roles(user_id,role_id)VALUES (:user_id,:role_id)";
				$stmt=$pdo->prepare($sql);
				$stmt->bindParam(':user_id',$user_id);
				$stmt->bindParam(':role_id',$role_id);
				$stmt->execute();
				if($stmt->rowCount()){
					header("location:login.php");
				}else{
					echo "Error";
				}


		}

	

 ?>