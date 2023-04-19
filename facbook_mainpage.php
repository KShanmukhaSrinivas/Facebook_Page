<DOCTYPE>
    <html>
        <head><title>Main Page</title>
        <style>
            body{
                background-color:#fff1e1;
                text-align:center;
            }
            .test{
                background-color: #1d3c45;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius:10px;
           }
           h1{
            color:#d2601a;
            font-size:70px;
           }
img{
    width:300px;
    align:center;
}
a{
    color:white;
    text-decoration:none;
}
.active{
    background-color:green;
    border-radius:100%;
    
}
table,th,td{
    border:1px solid black;
    cell-padding:1px solid black;
    padding:3px;
}

        </style>
</head>
<body>
    <div>
    <h1>FaceBook</h1>
    <img src="logo2.jpg" alt="NTH"><br>
    <button class="test"><a href="facebook_login.php" class="button">Login</a></button>
    <button class="test"><a href="facebook_register.php" class="button">Sign-up</a></button>
    
        </div>
<?php
  $conn = mysqli_connect("localhost", "root", "", "cse152");
  $res=mysqli_query($conn,"SELECT * FROM `active users` ");
  echo "<table><tr><th colspan='2'><h2>Active-Users</h2></th></tr>";
  while($images= mysqli_fetch_assoc($res))
     { echo "<tr><td><button class='active' type='button' disabled></button></td><td><h3>".$images['name']."</h3></td></tr>";
     }
     header("refresh: 5;");
     ?>