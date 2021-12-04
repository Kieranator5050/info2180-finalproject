<?php
session_start();

require '../subpages/dbconfig.php';

$title = htmlspecialchars(filter_input(INPUT_GET,'title',FILTER_SANITIZE_STRING));

$desc = htmlspecialchars(filter_input(INPUT_GET,'desc',FILTER_SANITIZE_STRING));

$type = htmlspecialchars(filter_input(INPUT_GET,'type',FILTER_SANITIZE_STRING));

$priority = htmlspecialchars(filter_input(INPUT_GET,'priority',FILTER_SANITIZE_STRING));

$assigned = htmlspecialchars(filter_input(INPUT_GET,'assigned',FILTER_SANITIZE_STRING));

$names = explode(" ", $assigned);
$fname = $names[0];
$lname = $names[1];

$stmt = $conn->prepare("SELECT id FROM users WHERE firstname='$fname' AND lastname='$lname'");
$stmt->execute();
$results = $stmt->fetch(PDO::FETCH_ASSOC);
$assigned_id = $results['id'];

$created_by = $_SESSION["ID"];

date_default_timezone_set('US/Eastern');
$created_date = $updated_date = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO issues (title,description,type,priority,status,assigned_to,created_by,created,updated) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt->execute([$title,$desc,$type,$priority,"Open",$assigned_id,$created_by,$created_date,$updated_date]);

echo "alert('A new issue was successfully created');";
?>