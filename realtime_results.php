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
<body class="bg-light" style="background-image:url(b.jpg); background-repeat: no-repeat;background-size: cover;height: 624px ">
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
        <a href="presults.php" style="color: white; font-family:Verdana; cursor: pointer; font-weight: bolder;" >PRESDENTIAL RESULTS</a>
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
              <h5 class="card-title text-center" style="color: purple">REALTIME RESULTS</h5>
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
                             
                                    <label style="font-weight: bold;" class="col-sm-4 col-form-label">Select Post</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="category_item" id="orders" onchange="getDetail(this.value);">
                                     
                                         
                                    </select>
</div>
                                </div>
  
                                 <div class="form-group row">
                             
                                    <label style="font-weight: bold;" class="col-sm-4 col-form-label">Select Candidate</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_item" id="order-details" onchange="getProduct(this.value);">
                                   
                                      

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


    <input type="text" class="form-control" name="results" readonly="readonly"  value="<?php echo rowcount($connect,"Select * from votes where candidate='".$_POST['sub_category_item']."'") ?>">
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

 
<script type="text/javascript">
    function getOrders() {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "get-orders.php", true);
        ajax.send();

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var html = "<option>Select Position</option>";
                for (var a = 0; a < response.length; a++) {
                    html += "<option value='" + response[a].name + "'>";
                        html += response[a].name;
                    html += "</option>";
                }
                document.getElementById("orders").innerHTML = html;
            }
        };
    }

    function getDetail(name) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "get-order-detail.php?name=" + name, true);
        ajax.send();

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var html = "<option>Select Candidate</option>";
                for (var a = 0; a < response.length; a++) {
                    html += "<option value='" + response[a].candidate + "'>";
                        html += response[a].candidate;
                    html += "</option>";
                }
                document.getElementById("order-details").innerHTML = html;
            }
        };
    }

    function getProduct(productCode) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "get-product.php?productCode=" + productCode, true);
        ajax.send();

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var html = "";
                html += "<p>Title: " + response.productName + "</p>";
                
                document.getElementById("product").innerHTML = html;
            }
        };
    }

    getOrders();
</script>


</body>
</html>

