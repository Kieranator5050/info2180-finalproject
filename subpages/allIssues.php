<html>
<link rel="stylesheet" href="home.css">
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
                      echo "<tr><td>" . $row['title'] . "<td<td>" . $row['type'] . "<td><td>" . $row['status'] . "<td><td>" . $row['assigned_to'] . "<td><td>" . $row['created'] . "<tr><td>";
                  }
                }
                  $table->close();
              ?>
            </tbody>
        </table>
    </div>
<div>
</html>
<script type="text/javascript" src="./subpages/js/filter.js"></script>