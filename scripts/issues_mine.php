<?php
    session_start();
    $table= mysqli_connect("localhost","admin@project2.com","password123","bugme" );
    $id = $_SESSION['ID'];
    $sql = "SELECT * FROM  issues where assigned_to = $id ";
    $result= $table->query($sql);

    if ($result->num_rows>0){
    while ($row= $result->fetch_assoc()){
        $rowID = $row['assigned_to'];
        $sql = "SELECT DISTINCT users.id, users.firstname, users.lastname FROM users WHERE users.id=$rowID";
        $assignedTo = $table->query($sql)->fetch_assoc();
        $assignedName = $assignedTo['firstname'] . $assignedTo['lastname'];
        echo "<tr><td>#<span class=\"id\">" . $row['id']."</span> <a class=\"title\">".$row['title'] . "</a></td><td>" . $row['type'] . "</td><td class=\"statusContainer\"><span class=\"status\">" . $row['status'] . "</span></td><td>" . $assignedName . "</td><td>" . $row['created'] . "</td><tr>";
    }
}
    $table->close();
              ?>