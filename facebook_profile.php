<?php
session_start();
$us_name=$_SESSION['name'];
echo "<h1>";
echo $us_name;
echo "</h1>";
$db = new mysqli("localhost", "root","", "cse152");
$res= mysqli_query($db,"SELECT * from images WHERE name ='$us_name' ");
if(mysqli_num_rows($res)>0){
    while($images= mysqli_fetch_assoc($res))
   {
      echo "<hr>";
      ?>
    <div class="alb">
      <?php
         
         echo "<h3 style=' font-family:cursive' ><i>".$images['name']."</i></h3>"; ?>
      <img src="images/<?php echo $images['file_name']; ?>" width="400px" height="300px">
      




    </div>
         <?php
         }}
         ?>
  