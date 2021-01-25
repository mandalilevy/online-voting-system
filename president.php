<?php

$connection = mysqli_connect("localhost", "root", "", "piu_vote");
$pst="president";
$sql = "SELECT * FROM posts where name='$pst'";
$result = mysqli_query($connection, $sql);

$data = array();

while ($row = mysqli_fetch_object($result))
    array_push($data, $row);

echo json_encode($data);