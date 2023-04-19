<?php
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["email"])) or empty(trim($_POST["password"])))  {
        alert("Please enter your credentials");
    }
     else {

        $pass = trim($_POST["password"]);
        $email = trim($_POST["email"]);
        $conn = mysqli_connect("localhost", "root", "", "cse152");
        $us_name= mysqli_query($conn,"SELECT * FROM `fb_reg` WHERE password='$pass'");
        while($k= mysqli_fetch_array($us_name)){
             $kk=$k['username'];
        }
        
        if($us_name->num_rows == 0){
            header("location:facebook_login.php");
            echo '<script>alert("Entered Password or emailid are incorrect")</script>';
            
        }
        else{
            $sql2=mysqli_query($conn,"INSERT INTO `active users`(`name`) VALUES ('$kk')");
			$_SESSION["email"] = $email;
			$_SESSION["password"] = $pass;
            $_SESSION["name"] = $kk;
            #echo '<pre>' . print_r($_SESSION["name"], TRUE) . '</pre>';
            header("location:facebook_post(2).php");
        }

    } 

}
  ?>
  
<!DOCTYPE >
<html>
<head>
    <title>FaceBook Login</title>
    <style>
        body{
            background-color:#fff1e1;
            text-align:center;

        }
        div{
            text-align:centre;
            margin-top: auto;
            margin-botton: auto;
            padding: 200px;
        }
        label{
            color:#d2601a;
            border-radius: 100px;
        }
        button{
            width:250px;
            background-color:#1d3c45;
            border-radius: 5px;
            color:white
        }
        button:hover {
            background-color: green; 
            color:#1d3c45 ;
        }
        a{
            color:white
        }
        
    </style>
</head>
<body>
    <div>
    <h2 style="color:#d2601a"> Login with Email</h2>
    <form method="POST" action="facebook_login.php">
        <label style="padding-left:15px">Email:</label>
        <input type="email" name="email" required>
        <br><br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit" name="login">Login</button>
    </form>
    </div>
</body>
</html>
