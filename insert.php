
<?php
$con=mysqli_connect("127.0.0.1","root","","piu_vote");

$idn=$_POST['id'];
$nm=$_POST['name'];
$em=$_POST['email'];
$ps=$_POST['pass'];
$sql = "INSERT INTO `student_register`(`regno`, `name`, `email`, `password`) VALUES ('$idn', '$nm', '$em','$ps')";
if(mysqli_query($con, $sql)){
echo "Message Saved";
header("Location:index.php");
} 

else{
   header("Location:registration.php?Invalid=Data Not Saved!! Duplicate entry of ID Number");
}
 

mysqli_close($con);
 ?>