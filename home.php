<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.4.1.js"crossorigin="anonymous"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="#">
  <script type="text/javascript" href = "#"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>BugMe Issue Tracker</title>
</head>

<body>

  <div class="header">
    <h1><i class="material-icons"> bug_report</i>BugMe Issue Tracker</h1>
  </div>

  <div class="sidebar">
    <ul class="">
      <li><a class ="home-page" href="home.php"> Home</a></li>
      <li><a class ="add-u-page" href="createuser.html"> Add User</a></li>
      <li><a class ="new-issue-page" href="newissue.php"> New Issue</a></li>
      <li><a class ="logout-page" href="logout.php"> Logout</a></li>
    </ul>
  </div>


  <div class="mainbar">
    <div class="dashtable">
      <h1> Issues </h1>
      <br>
      <?php


        $connect = new PDO('mysql:host=localhost;dbname=bugme;', 'bugmeapp', 'password');
        $stmt = $connect->query("SELECT * FROM issues");
        $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
      ?>
      <ul>
          <?php foreach ($results as $row){
            echo "<li><a href='view.php"."?id=".$row['id']."'>".$row['title']."</li></a>";
          }
          ?>
      </ul>  

      
    </div>
  </div>


</body>

</html>