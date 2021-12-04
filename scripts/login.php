<?php
    session_start();

    //Define database credentials
    //Make connection
    require '../subpages/dbconfig.php';

    //Try catch block to check for connection errors
    try {

        if(!empty($_GET['email']) && !empty($_GET['password'])){

            //Recieve query variables for the email and password.
            //The email is sanitized and verified
            $email = htmlspecialchars(filter_input(INPUT_GET,'email',FILTER_SANITIZE_EMAIL));
            $pass = htmlspecialchars(filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING));

            //Make SQL query to find email
            $stmt = $conn->prepare("SELECT id, password FROM users WHERE email='$email'");
            $stmt->execute();

            //Retreive the result
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $correct = false;

            foreach($results as $result){
                $hashedpassword=$result['password'];
                if(password_verify($pass,$hashedpassword)){
                    $correct = true;
                    $_SESSION['sessionID'] = $email.$pass;
                    $_SESSION['ID'] = $result['id'];
                    $_SESSION['isLogged'] = true;
                    $_SESSION['email'] = $email;
                    break;
                }
            }
            
            if($correct){
                echo "success";
            } else {
                echo "failure";
            }  
        }        
    
    } catch (PDOException $e) {
        echo "Connection Error";
    }

    //Terminate connection
    $conn = NULL;   
?>