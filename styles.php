<?php header("Content-type: text/css"); ?>

.nav-item{
  align-items: center;
  <?php
  //Checking if user is logged in to display nav bar
  session_start();
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



