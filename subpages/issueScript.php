<?php
//starting of session
session_start();
//require_once 'dbconfig.php'
//session_destroy();
?>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //echo $_POST['type']," Is Assigned To: ",$_POST['assigned']," ", date("Y-m-d H:i:s");
    //Accepting input from the form that was sent through Js and assigning them 
    //$email = $_SESSION['email'];
    //echo $_POST['assigned'];
    //echo "First Name :",$nameArray[0], " Last Name: ", $nameArray[1];
    $fullName = $_POST['assigned'];
    $nameArray = explode(" ",$fullName);

    $email = 'lockedDoor@email.sub.sub.com'; //This will be switched out with the sessions Email 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $priority = $_POST['priority'];
    $status = "Open";

    date_default_timezone_set('Jamaica');
    $created = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");

    //Obtaining Id of the user logged in for the current session. 
    // How it works: Checks the session Email and finds the matching ID in the DB.
    $userId = $conn->query("SELECT `id` FROM `users` WHERE email = '$email'");
    $currentUserArray = $userId->fetchAll(PDO::FETCH_ASSOC);
    $currentUser = implode($currentUserArray[0]);
    $created_by = intval($currentUser);

    //Obtaining Id of the user that the task was assigned to.
    $AssignedId = $conn->query("SELECT `id` FROM `users` WHERE firstname = '$nameArray[0]'");
    $AssignedIdArray = $AssignedId->fetchAll(PDO::FETCH_ASSOC);
    $assignedstr = implode($AssignedIdArray[0]);
    $assigned = intval($assignedstr);

    //echo "Current Session User ID: ",$currentUser," Assigned User ID: ",$assigned;
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
?>
