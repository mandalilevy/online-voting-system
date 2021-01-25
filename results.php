<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PIU VOTING SYSTEM</title>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="bootstrap.css">
 <link rel="stylesheet" href="bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap-reboot.min.css">
 <link rel="stylesheet" href="bootstrap-reboot.css">

  <link rel = "icon" href = "logo.jpg" type = "image/x-icon"> 
</head>
<body class="bg-light"  style="background-image:url(b.jpg); background-repeat: no-repeat;background-size: cover;height: 624px ">
  <div>
 <nav class="navbar navbar-expand-lg navbar-light" style="background-color: purple" >

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    
<ul class="navbar-nav  mt-lg-0 mr-auto">
  <li class="nav-item">
          <?php 
  session_start();
if (isset($_SESSION['User'])) {
                  echo '<a style="color: white; font-family:Verdana; font-weight:bolder;" class="nav-link"> Welcome: '.$_SESSION['User'].'</a>';
                    }


 ?>
      </li>
</ul >
<ul class="navbar-nav  mt-lg-0 mx-auto">
    <li class="nav-item">
        <a style="color: white; font-family:Verdana; font-weight: bolder;" >PIU ONLINE VOTING SYSTEM</a>
      </li>
</ul>
 <ul class="navbar-nav  mt-lg-0 ml-auto">
  <li class="nav-item">
        <a href="main.php" style="color: white; font-family:Verdana; cursor: pointer; font-weight: bolder;" ><i class="fa fa-home fa-2x"></i></a>
      </li>
 
 </ul>
 </div> 
  </div>
</nav>
</div>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 mt-4 p-2 rounded bg-white">
        <div class="">
          <div >
              <h5 class="card-title text-center" style="color: purple">REALTIME GENERAL RESULTS</h5>
             <?php 
                 if (@$_GET['Invalid']==true)
                 {
                   ?>
                  <div class="card-title alert-light text-danger text-center text-uppercase"><?php echo $_GET['Invalid']?></div>
                   <?php 
                 }
               ?>
                 <?php 
                 if (@$_GET['success']==true)
                 {
                   ?>
                  <div class="card-title alert-light text-success text-center text-uppercase"><?php echo $_GET['success']?></div>
                   <?php 
                 }
               ?>

       <form action="" method="POST">       
  
                                 <div class="form-group row">
                             
                                    <label style="font-weight: bold;" class="col-sm-4 col-form-label">Select Candidate</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="name">
                                      <option value="">Select Candidate</option>
                                           <?php 
                                 //  session_start();
$con=mysqli_connect("127.0.0.1","root","","piu_vote");
$query = "SELECT * FROM candidates";
$query_run=mysqli_query($con,$query);
while($row=mysqli_fetch_array($query_run)) {?>

                                      <option><?php echo $row['candidate'];?></option>
                                         <?php 
}
 ?>
                                    </select>
</div>
    </div>
    <center>
    <button name="view" class="btn btn-group-lg btn-primary">View</button>
    </center>
<div class="form-group row">
 
        <label style="font-weight: bold;" class="col-sm-4 col-form-label"></label>
        <div class="col-sm-10">


<?php
if (isset($_POST['view'])) {

$connect=new PDO('mysql:host=localhost;dbname=piu_vote','root','');
function rowcount($connect,$query){
$stmt=$connect->prepare($query);
$stmt->execute();
return $stmt->rowcount();
}

 ?> 


    <input type="text" class="form-control" name="results" readonly="readonly"  value="<?php echo rowcount($connect,"Select * from votes where candidate='".$_POST['name']."'") ?>">
<?php } ?>



</div>
    </div>
  <span id="success_message" class="text-success"></span>
                </fieldset>
  </form>


          </div>
        </div>
      </div>
    </div>

 


</body>
</html>

