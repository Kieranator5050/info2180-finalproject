
<?php
$issue_id = $_GET['issue_id'];

if(!empty($conn)){ //if connected
    try{
        $stmt = $conn->prepare("SELECT Issues.*, Users.firstname, Users.lastname FROM Issues JOIN Users ON Issues.id=:id and Users.id = Issues.assigned_to");
        $stmt->bindParam(':id', $issue_id);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $stmt2 = $conn->query("SELECT firstname, lastname from Users where id = " . $row['created_by']);
            while ($row2 = $stmt2->fetch()){
                echo "<div class='main'>
                    <h2>".$row['title']."</h2>
                    <h6>Issue #".$row['id']."</h6>
                    <p>".$row['description']."
                    </p>
                    <p> Issue created on " . $row['created'] . " by " . $row2['firstname']. " " . $row2['lastname'] . "</p>
                    <p> Last updated on " . $row['updated'] . "</p>
                </div>
            
                <div class='right'>
                    <div class='info'><b>Assigned To</b><p>" . $row['firstname'] . " " . $row['lastname']. "</p>
                    <b>Type</b><br><p>" . $row['type']. "</p>
                    <b>Priority</b><br><p>" . $row['priority']. "</p>
                    <b>Status</b><br><p>" . $row['status']. "</p></div>
                    <input id='b_close' type='submit' value='Mark as Closed'><br><br>
                    <input id='b_progress' type='submit' value='Mark In Progress'><br>
                </div>";
            }
        }
    } catch(PDOException $e) {
        $_SESSION["error"] = $e->getMessage();
        echo $_SESSION["error"];
    }

    //require '.php';//
    $conn = null;

}

?>