<?php
    session_start();
?>

<header>
    <ul>
        <li><img src="media/bug_report-white-18dp.svg" alt="bug" /></li>
        <li>
            <h3>BugMe Issue Tracker</h3>
        </li>
    </ul>
</header>

<!-- Beginning of sidebar -->
<aside>
    <div id="sidebar-items">
        <ul>
            <li class="sidebar-item" id="home">
                <img src="media/home-24px.svg" alt="home"/>Home
            </li>
        <?php if($_SESSION['sessionID'] == "admin@project2.compassword123"){ ?>
            <li class="sidebar-item" id="user">
                <img src="media/person_add-24px.svg" alt="add-user"/>Add User
            </li>
        <?php } ?>
            <li class="sidebar-item" id="issue">
                <img src="media/add_circle-24px.svg" alt="add-issue"/>New Issue
            </li>
            <li class="sidebar-item" id="logout">
                <img src="media/power_settings_new-24px.svg" alt="logout"/>Logout
            </li>
        </ul>
    </div>
</aside>
<!-- End of sidebar -->

<div id="container">
    <main>
        <div class="inner">
            <form id="add-user" method="post">
                <h2>New User</h2>

                <label>Firstname</label>
                <input id="add-user-fname" type="text" name="fname" required>
                
                <label>Lastname</label>
                <input id="add-user-lname" type="text" name="lname" required>

                <label>Password</label>
                <input id="add-user-password" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                
                <label>Email</label>
                <input id="add-user-email" type="email" name="email" required>
                
                <button id="addSubmit" name="newUser" type="button">Submit</button>
            </form>
            <div>
                <div style="margin-top: 10px; color: red">
                        No fields can be left empty and email must be valid.
                        Password must contain at least one number,
                        one uppercase and lowercase letter, and at least 8 or more characters.
                </div>    
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.getScript("js/main.js");
</script>