<?php
session_start();

require_once 'dbconfig.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$correct = false;

if($_SERVER['REQUEST_METHOD']==='POST'){ 
    if(isset($_POST['login'])){
        if(isset($_POST['email']) && isset($_POST['password'])){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = strtolower(htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL)));
                $password = htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING)); 

                $stmt = $conn->prepare("SELECT password FROM users WHERE email='$email'");
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($results as $result){
                    $hashedpassword=$result['password'];
                    if(password_verify($password,$hashedpassword)){
                        $correct = true;
                        $_SESSION['ID'] = $email.$hashedpassword;
                        break;
                    }
                }
            }
        }
    }
}

if($correct){
    header("location: dashboard.php");
}else{
    header("location: index.php");
}