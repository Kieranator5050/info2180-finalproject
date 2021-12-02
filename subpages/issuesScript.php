<?php

$host = 'localhost';
$username = 'admin@project2.com';
$password = 'password123';        
$dbname = 'bugme';
//Connection To the Database 
try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

if(!empty($conn)){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fullName = trim(filter_var($_POST['assigned'], FILTER_SANITIZE_STRING));
        $nameArray = explode(" ",$fullName);
        //var_dump($fullName);

        $email = 'admin@project2.com'; //This will be switched out with the sessions Email 
        //var_dump($title);
        $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
        $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
        $type = trim(filter_var($_POST['type'], FILTER_SANITIZE_STRING));
        $priority = trim(filter_var($_POST['priority'], FILTER_SANITIZE_STRING));
        $status = "Open";
        //var_dump($type);

        date_default_timezone_set('Jamaica');
        $created = date("Y-m-d H:i:s");
        $updated = date("Y-m-d H:i:s");

        //getting the ID of user that assigned the task
        $userId = $conn->query("SELECT `id` FROM `users` WHERE email = '$email'");
        $currentUserArray = $userId->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($currentUserArray);
        $assignedstr = implode($currentUserArray[0]);
        $created_by = intval($assignedstr);
        //var_dump($assigned);
        //var_dump($nameArray[0]);

        //getting the ID of user that the task was assigned to 
        $AssignedId = $conn->query("SELECT `id` FROM `users` WHERE firstname = '$nameArray[0]'");
        $AssignedIdArray = $AssignedId->fetchAll(PDO::FETCH_ASSOC);
        $assignedstr = implode($AssignedIdArray[0]);
        $assigned = (int)$assignedstr;
        var_dump($assigned);
        //var_dump($assignedstr);
        //var_dump($AssignedIdArray[0]);
        $sql = "INSERT INTO issues(title, description, type, priority, status, assigned_to, created_by, created, updated) 
        VALUES('$title','$description','$type','$priority','$status','$assigned','$created_by','$created','$updated')";

        try{
            $conn->exec($sql);
            }catch(PDOException $e){
                echo $sql . "<br>" . $e->getMessage();
            }
    }else{
        echo 'There was an error with your request';
    }
 }
?>