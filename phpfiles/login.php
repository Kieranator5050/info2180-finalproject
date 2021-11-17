<?php
    session_start();
    if(isset($_SESSION['isLogged'])){
        if($_SESSION['isLogged']){
            //If the current session is already logged in then perform no requests
            die();
        }
    } else {
        //Define database credentials
        $host = 'localhost';
        $username = 'admin@project2.com';
        $password = 'password123';
        $dbname = 'bugme';

        $homeurl = '../htmlsnippets/allissues.html';

        //Try catch block to check for connection errors
        try {
            //Make connection
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            //Recieve query variables for the email and password.
            //The email is sanitized and verified
            $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
            $pass = $_REQUEST['password'];

            //Make SQL query to find email and password
            $stmt = $conn->query("SELECT * FROM `users` WHERE email='$email' AND password=PASSWORD('$pass')");

            //Retreive the result
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //If the result is not null then bring up the homepage else show the login screen again
            if($result!=NULL){
                //Set the session variable isLogged to true and include the homepage html
                $_SESSION['isLogged'] = true;
                $_SESSION['password'] = password_hash($pass, PASSWORD_DEFAULT);
                $_SESSION['email'] = $email;
                include $homeurl;
            } else {
                //If the result is null include the login html
                include '../htmlsnippets/login.html';
            }
        
        } catch (PDOException $e) {
            echo "Connection Error";
        }
    
        //Terminate connection
        $conn = NULL;   
    }
?>