<?php 
require_once('connection.php');
session_start();
if (isset($_POST['submit'])) 
{
if (empty($_POST['name']) || empty($_POST['pass']))
  {
	header("Location:index.php?Empty=please fill in the blanks");
  }
else
{
$query ="SELECT * FROM `student_register` WHERE email='".$_POST['name']."' AND password='".$_POST['pass']."'";
$result=mysqli_query($con,$query);
if (mysqli_fetch_assoc($result)) {
	$_SESSION['User']=$_POST['name'];
	header("Location:dashboard.php");
}
else{
	header("Location:index.php?Invalid= Invalid Username and Password!");
}
}
}
else
{
	echo "NOT WORKING NOW";
}
 ?>
