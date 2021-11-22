<?php
    session_start();
    //var_dump($_REQUEST['requestType']);
    $request = filter_var($_REQUEST['requestType'], FILTER_SANITIZE_NUMBER_INT);
    $homeurl = '../subpages/allissues.php';
    $createIssueUrl = '../subpages/createIssue.php';
    $newUserUrl = '../subpages/newuser.php';
    $loginUrl = '../subpages/login.php';

    if ($request==0) {
        //Home
        include $homeurl;
    } elseif ($request==1) {
        //Add User
        if(isset($_SESSION['email'])){
            if($_SESSION['email']=="admin@project2.com"){
                include $newUserUrl;
            } else {
                include $homeurl;
            }
        } else {
            include $homeurl;
        }
        

    } elseif ($request==2) {
        //New Issue
        include $createIssueUrl;

    } else {
        //Logout
        include $loginUrl;
        session_destroy();
    }
?>