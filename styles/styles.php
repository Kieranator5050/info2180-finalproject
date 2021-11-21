<?php header("Content-type: text/css"); 
session_start();
?>

.nav-item{
  align-items: center;
  <?php
  //Checking if user is logged in to display nav bar
  if(isset($_SESSION['isLogged'])){
    if($_SESSION['isLogged']) {
      echo "display: flex";
    } else{
      echo "display: none";
    }
  } else {
    echo "display: none";
  }
  ?>
}

#new-user{
  <?php 
  if(isset($_SESSION['email'])){
    if($_SESSION['email']=="admin@project2.com"){
      echo "display: flex";
    } else {
      echo "display: none";
    }
  } else {
    echo "display: none";
  }
  ?>
}



