<?php
    session_start();
    if(isset($_SESSION['isLogged'])){
        if($_SESSION['isLogged']){
            //If the current session is already logged in then perform no requests
            die();
        }
    } else {
        //Define database credentials
        require_once '../scripts/dbconfig.php';

        $homeurl = '../subpages/allissues.php';

        //Try catch block to check for connection errors
        try {
            //Make connection
            require_once '../scripts/dbconnect.php';
            if(!empty($_REQUEST['email']) && !empty($_REQUEST['password'])){
                //Recieve query variables for the email and password.
                //The email is sanitized and verified
                $email = htmlspecialchars(filter_input(INPUT_GET,'email',FILTER_SANITIZE_EMAIL));
                $pass = htmlspecialchars(filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING));

                //Make SQL query to find email
                $stmt = $conn->prepare("SELECT password FROM users WHERE email='$email'");
                $stmt->execute();
                //Retreive the result
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $correct = false;
                foreach($results as $result){
                    $hashedpassword=$result['password'];
                    if(password_verify($password,$hashedpassword)){
                        $correct = true;
                        $_SESSION['ID'] = $email.$hashedpassword;
                        $_SESSION['isLogged'] = true;
                        $_SESSION['email'] = $email;
                        break;
                    }
                }
                
                if($correct){
                    include $homeurl;
                } else {
                    include '../subpages/login.php';
                }
                
            } else {
                include '../subpages/login.php';
            }
                
        
        } catch (PDOException $e) {
            echo "Connection Error";
        }
    
        //Terminate connection
        $conn = NULL;   
    }
?>