<?php 
  session_start();
  //session_destroy();
?>
<script src="createIssue.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<h1>Create Issue</h1>
<form class="submission" action="" method="post" id = "form">

    <label for="title">Title</label><br>
    <input type="text" class ="title" name="title"><br><br>

    <label for="description">Description</label><br>
    <input type="text" class ="description" name="description"><br><br>

    <label> Assigned To</label><br>
    <select name = "assigned" class = "assigned">
        <option> Akiel Walsh </option>
        <option> Key Jug </option>
        <option> ADMIN USER </option>
        
    </select><br><br>
    

    <label> Type </label><br>
    <select name = "bug" class = "bug">
        <option> Bug </option>
        <option> Proposal </option>
        <option> Task </option>
    </select><br><br>

    <label> Priority </label><br>
    <select name = "priority" class = "priority" >
        <option> Minor </option>
        <option> Major </option>
        <option> Critical </option>
    </select><br><br>

    <button type = "submit" name = "submit" class = "btn"> Submit </button>

  </form>

<!-- <script type="text/javascript" src="./subpages/js/test.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>