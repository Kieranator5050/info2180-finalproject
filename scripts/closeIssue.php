<?php
require '../subpages/dbconfig.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$index = htmlspecialchars(filter_input(INPUT_GET,'index',FILTER_SANITIZE_STRING)); 

date_default_timezone_set('US/Eastern');
$updated_date = date("Y-m-d H:i:s");

$stmt = $conn->prepare("UPDATE issues SET status=?, updated=? WHERE id='$index'");
$stmt->execute(["Closed",$updated_date]);  