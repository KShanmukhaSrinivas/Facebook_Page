<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
    <link rel="stylesheet" href="facebook_register_style.php" media="screen">

</head>
<body>

<?php
	session_start(); 

	
	$name = $email = $password = "";
	$name_err = $email_err = $password_err = "";


	if($_SERVER["REQUEST_METHOD"] == "POST") {

	
		if(empty(trim($_POST["name"]))) {
			$name_err = "Please enter your name.";
		} else {
			$name = trim($_POST["name"]);
		} 

		
		if(empty(trim($_POST["email"]))) {
			$email_err = "Please enter your email.";
		} else {
			
			$conn = mysqli_connect("localhost", "root", "", "cse152");
			$email = trim($_POST["email"]);

	   }
		
		if(empty(trim($_POST["password"]))) {
			$password_err = "Please enter your password.";
		} elseif(strlen(trim($_POST["password"])) < 6) {
			$password_err = "Password must have at least 6 characters.";
		} else {
			$password = trim($_POST["password"]);
		}

		
		#if(empty($name_err) && empty($email_err) && empty($password_err)) {
			
			
			$_SESSION["loggedin"] = true;
			
			$result = mysqli_query($conn,"SELECT email FROM fb_reg WHERE email = '$email'");
			if($result->num_rows == 0){
				$sql1= "INSERT INTO fb_reg VALUES('$name', '$email', '$password')";
				#$sql2=mysqli_query($conn,"INSERT INTO `images`(`name`) VALUES ('$name')");
				$sql = mysqli_query($conn,$sql1);
				
			}
			else{
				echo "Email-id has already been registered";
				exit;
			}
			
			echo "<script>alert('Successfully Registered');document.location='facbook_mainpage.php'</script>";
			
			?>
			
			<?php
			exit;
		#}
	}
?>

<h2>Registration Form</h2>
<div>
<form method="post" action="facebook_register.php">
	Name: <input type="text" name="name" value="<?php echo $name; ?>">
	<span><?php echo $name_err; ?></span><br><br>
	Email: <input type="email" name="email" value="<?php echo $email; ?>">
	<span><?php echo $email_err; ?></span><br><br>
	Password: <input type="password" name="password" value="<?php echo $password; ?>">
	<span><?php echo $password_err; ?></span><br><br>
	<input type="submit" name="submit" value="Register">
	
</form>
</div>


</body>
</html>