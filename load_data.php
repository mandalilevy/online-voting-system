<?php

$connect = new PDO("mysql:host=localhost;dbname=piu_vote", "root", "");

if(isset($_POST["type"]))
{
 if($_POST["type"] == "category_data")
 {
  $query = "
  SELECT * FROM candidates 
  ORDER BY post ASC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'name'  => $row["post"]
   );
  }
  echo json_encode($output);
 }
 else
 {
  $query = "
  SELECT * FROM candidates 
  WHERE post = '".$_POST["category_id"]."' 
  
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $data = $statement->fetchAll();
  foreach($data as $row)
  {
   $output[] = array(
    'name'  => $row["candidate"]
   );
  }
  echo json_encode($output);
 }
}

?>