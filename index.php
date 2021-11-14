<?php 
  /**
   * Start a session when landing on the page.
   */
  session_start();
  session_destroy();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BugMe Issue Tracker</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./styles.php">
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
          include './htmlsnippets/navbar.html'; 
        ?>
      </nav>
      <!-- NOTE: Main section-->
      <section class="main-section" id="mainSection">
        <?php
          //If already logged in display home screen else show login display
          if (isset($_SESSION['isLogged'])) {
            include './htmlsnippets/allIssues.html';
          } else {
            /**
             * Login Process is as follows:
             * index.php -> login.html -> login.js -> login.php -> ? allIssues.html : login.html
             * 1) index.php includes login.html
             * 2) login.html loads login.js
             * 3) login.js listens for a button click and sends an ajax request to login.php
             * 4) login.php checks the email and password against the database and returns the allIssues.html file to the main section
             * 5) If the login fails the login.html file is returned to the main section
             */
            include './htmlsnippets/login.html';
          }
        ?>
      </section>
    </main>

    <!-- NOTE: Footer -->
    <footer>

    </footer>
  </body>
</html>

