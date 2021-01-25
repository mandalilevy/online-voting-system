<?php

$connection = mysqli_connect("localhost", "root", "", "piu_vote");
$pst="PRESIDENT";
$sql = "SELECT * FROM posts WHERE NOT name = '$pst'";
$result = mysqli_query($connection, $sql);

$data = array();

while ($row = mysqli_fetch_object($result))
    array_push($data, $row);

echo json_encode($data);