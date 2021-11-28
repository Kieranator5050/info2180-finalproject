<?php 
  session_start();
  //session_destroy();
?>
<?php
    $host = 'localhost';
    $username = 'admin@project2.com';
    $password = 'password123';        
    $dbname = 'bugme';
    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['submit'])){
            if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['assigned']) && !empty($_POST['bug']) && !empty($_POST['priority'])){
                
                //$id = 4; // for testing
                $title = $_POST['title'];
                $description = $_POST['description'];
                //$assigned = $_POST['assigned'];
                $assigned = 9;
                $bug = $_POST['bug'];
                $priority = $_POST['priority'];
                $status = "Open";
                $created_by = 8;

                date_default_timezone_set("Jamaica");
                $created = date("Y-m-d H:i:s");
                $updated = date("Y-m-d H:i:s");

                $sql = "INSERT INTO issues(title, description, type, priority, status, assigned_to, created_by, created, updated) 
                VALUES('$title','$description','$bug','$priority','$status','$assigned','$created_by','$created','$updated')";
                $conn->exec($sql);
                echo "New record created successfully";
                //echo $title,$description,$bug,$priority,$status,$assigned,$created_by,$created,$updated;
            }
            else{
                echo "Please enter all fields";
            } 
        }
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

?>