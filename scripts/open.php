<?php
    $table= mysqli_connect("localhost","admin@project2.com","password123","bugme" );
    $sql = "SELECT * FROM  issues where status = 'Open' ";
    $result= $table->query($sql);

    if ($result->num_rows>0){
    while ($row= $result->fetch_assoc()){
        echo "<tr><td>" . $row['title'] . "<td<td>" . $row['type'] . "<td><td>" . $row['status'] . "<td><td>" . $row['assigned_to'] . "<td><td>" . $row['created'] . "<tr><td>";
    }
}
    $table->close();
              ?>