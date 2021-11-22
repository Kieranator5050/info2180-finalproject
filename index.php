<?php 
  /**
   * Start a session when landing on the page.
   * Active Session Variables
   * $_SESSION['isLogged'] = true;
   * $_SESSION['password'] = password_hash($pass, PASSWORD_DEFAULT);
   * $_SESSION['email'] = $email;
   */
  session_start();
  //session_destroy();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BugMe Issue Tracker</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/styles.php">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>

  <body>
    <!-- NOTE: Header -->
    <header>
      <img src="./media/headerImg.png" alt="" class="header-img">
      <h1>BugMe Issue Tracker</h1>
    </header>

    <!-- NOTE: Main section -->
    <main>
      <!-- NOTE: Navbar -->
      <nav>
        <?php
          //Including all navbar items
          include './subpages/navbar.php'; 
        ?>
      </nav>
      <!-- NOTE: Main section-->
      <section class="main-section" id="mainSection">
        <?php
          //If already logged in display home screen else show login display
          if (isset($_SESSION['isLogged'])) {
            include './subpages/allIssues.php';
          } else {
            /**
             * subpages/login.php - login frontend
             * scripts/login.php - login backend
             * 
             * Login Process is as follows:
             * index.php -> subpages/login.php -> login.js -> scripts/login.php -> ? allIssues.html : subpages/login.php
             * 1) index.php includes subpages/login.php
             * 2) subpages/login.php loads login.js
             * 3) login.js listens for a button click and sends an ajax request to scripts/login.php
             * 4) scripts/login.php checks the email and password against the database and returns the allIssues.html file to the main section
             * 5) If the login fails the subpages/login.php file is returned to the main section
             */
            include './subpages/login.php';
          }
        ?>
      </section>
    </main>

    <!-- NOTE: Footer -->
    <footer>

    </footer>
  </body>
</html>

