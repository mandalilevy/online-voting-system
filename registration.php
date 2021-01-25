<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PIU VOTING SYSTEM</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="bootstrap.css">
 <link rel="stylesheet" href="bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap-reboot.min.css">
 <link rel="stylesheet" href="bootstrap-reboot.css">

  <link rel = "icon" href = "logo.jpg" type = "image/x-icon"> 
</head>
<body class="" style="background-image:url(b.jpg); background-repeat: no-repeat;background-size: cover;height: 624px ">
<div class="container">
    <div class="row">
      <div class="col-sm-5  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
              <h5 class="card-title text-center" style="color: purple">PIU ONLINE VOTING SYSTEM</h5>
              <?php 
                 if (@$_GET['Empty']==true)
                 {
                   ?>
                  <div class="card-title alert-light text-danger text-center text-uppercase"><?php echo $_GET['Empty']?></div>
                   <?php 
                 }
               ?>

<?php 
                 if (@$_GET['Invalid']==true)
                 {
                   ?>
                  <div class="card-title alert-light text-danger text-center text-uppercase"><?php echo $_GET['Invalid']?></div>
                   <?php 
                 }
               ?>


              <form class="form-signin" method="post" action="insert.php">
                <div class="form-group row">
                  <label for="nu">Student Registration Number</label>
                  <input type="text" id="nu" name="id" class="form-control" placeholder="Enter Your Registration Number"required="required" >           
              </div>
               <div class="form-group row">
                  <label for="namee">Student Name</label>
                  <input type="text" id="namee" name="name" class="form-control" placeholder="Enter your Name" required="required">           
              </div>
              <div class="form-group row">
                  <label for="">Student Email Address</label>
                  <input type="email" id="" name="email" class="form-control" placeholder="Email address" required="required">           
              </div>
              <div class="form-group row">
                  <label for="inputPassword">Password</label>
                  <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required="required">              
              </div>
              <button class="btn btn-success text-uppercase" name="submit" type="submit">Register</button>
             <div style="float:right;"><a href="index.php" style="text-decoration: underline;color: purple">Login Here</a> </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>













</body>
</html>