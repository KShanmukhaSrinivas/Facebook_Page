
 <!DOCTYPE html>
<html>
<head>
  
<style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  border-radius: 12px;
}
.center:hover {
  background-color: red; 
  color: white;
}
.formcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  border-radius: 12px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="facebook_post(2).php">Home</a></li>
  <li><a href="facebook_profile.php">Profile</a></li>
  <li><a href="facebook_logout.php">logout</a></li>
  <li><a href="highlights.php">Highlights</a></li>
</ul>

</body>
<script>
        fuction button(){
         let a=document.getElementById('b1');
         a.style.backgroundColor = "#000000"
        }
        </script>

</html>
<?php
 session_start();
 $db = new mysqli("localhost", "root","", "cse152");
       
    echo "<br><div>";
    echo   "<form action='' method='post' enctype='multipart/form-data'>";
    echo        "<input type='file' name='file' id='file'>";
    echo         "<input type='submit' name='submit' value='Upload'>";
    echo         "</form></div>";

    if(isset($_POST["submit"])){
        $targetDir = "images/";
        $fileName = $_FILES["file"]["name"];
        $targetFilePath = $targetDir . basename($_FILES["file"]["name"]);
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        $e_id=$_SESSION["email"];
        $u_name=$_SESSION["name"];
        #echo $u_name;
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
           $sql1=mysqli_query($db,"INSERT INTO `images`( `file_name`,`name`, `email`) VALUES ('$fileName','$u_name','$e_id')");
           if($sql1){
            echo "<script>alert('Successfully Posted');'</script>";
           }
           #$sql2=mysqli_query($db,"CREATE TABLE $fileName(content varchar(100),u_name varchar(25))");
        }
    }
    $con=mysqli_connect("localhost","root","","cse152");
    $sql="SELECT * FROM `images` ORDER BY `id` DESC";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
      while($images= mysqli_fetch_assoc($res))
     {
        echo "<hr>";
        ?>
      <div class="alb">
        <?php
           
           echo "<h3 style=' font-family:cursive' ><i>".$images['name']."</i></h3>"; ?>
        <img class='center' src="images/<?php echo $images['file_name']; ?>" width="400px" height="300px">
        <form method='post' action='like.php'> 
            <button type='submit' name='submit' id='b1' class='center' onclick='button()' value='<?php echo $images['id']; ?>'> Like</button>
        </form>
        <form action="" method='POST' class='formcenter'>
          Comments:<textarea rows='10' cols='30' name='commentcontent'class='formcenter' ></textarea></br>
          <input type='submit' value='Post!' class='formcenter'></br>
        </form>

        <span style="float:left;"><?php echo $images['likes'];?></span>




      </div>
           <?php

           }}
           ?>
    
    