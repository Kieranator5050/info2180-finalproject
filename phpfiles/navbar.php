<?php
    session_start();
    //var_dump($_REQUEST['requestType']);
    $request = filter_var($_REQUEST['requestType'], FILTER_SANITIZE_NUMBER_INT);
    $homeurl = '../htmlsnippets/allissues.html';

    if ($request==0) {
        //Home
        include $homeurl;
    } elseif ($request==1) {
        //Add User
        if(isset($_SESSION['email'])){
            if($_SESSION['email']=="admin@project2.com"){
                include '../htmlsnippets/newuser.html';
            } else {
                include $homeurl;
            }
        } else {
            include $homeurl;
        }
        

    } elseif ($request==2) {
        //New Issue
        include '../htmlsnippets/createIssue.html';

    } else {
        //Logout
        session_destroy();
    }
?>