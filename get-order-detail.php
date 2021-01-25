<?php

$orderNumber = $_GET["name"];
$connection = mysqli_connect("localhost", "root", "", "piu_vote");

$sql = "SELECT * FROM candidates WHERE post='$orderNumber'";
$result = mysqli_query($connection, $sql);

$data = array();

while ($row = mysqli_fetch_object($result))
    array_push($data, $row);

echo json_encode($data);