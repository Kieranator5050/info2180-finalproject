<?php 
if (!$_SESSION['isLogged']) {
    die();
}
?>

<html>
<link rel="stylesheet" href="home.css">
<section id="styles">
    <link rel="stylesheet" href="./subpages/styles/allissues.css">
</section>

<div class="HomeScreen">
    <div class="body">
        <div class="issues">
            <h1>Issues</h1>
            <h1><button type="" id="filterButtons">Create New Issue</button></h1>    
            <br><br><br><br>
            <p>Filter by:</p>
            <button id="filterButtons1">ALL</button>
            <button id="filterButtons2">Open</button>
            <button id="filterButtons3">My Tickets</button>
            <br><br>
        </div>  
        <table class="table">
            <thead>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Created</th>
            </thead>
            <tbody id="table-body">
                <tr>
                <?php
                  $table= mysqli_connect("localhost","admin@project2.com","password123","bugme" );
                  $sql = "SELECT * FROM  issues";
                  $result= $table->query($sql);

                  if ($result->num_rows>0){
                    while ($row= $result->fetch_assoc()){
                        $rowID = $row['assigned_to'];
                        $sql = "SELECT DISTINCT users.id, users.firstname, users.lastname FROM users WHERE users.id=$rowID";
                        $assignedTo = $table->query($sql)->fetch_assoc();
                        $assignedName = $assignedTo['firstname'] . $assignedTo['lastname'];
                        echo "<tr><td>#<p class=\"id\">" . $row['id']."</p><a class=\"title\">".$row['title'] . "</a></td><td>" . $row['type'] . "</td><td class=\"status\">" . $row['status'] . "</td><td>" . $assignedName . "</td><td>" . $row['created'] . "</td><tr>";
                  }
                }
                  $table->close();
              ?>
            </tbody>
        </table>
    </div>
<div>
</html>
<section id="script">
    <script type="text/javascript" src="./subpages/js/filter.js"></script>
</section>
