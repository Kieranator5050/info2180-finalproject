<?php
session_start();

require '../subpages/dbconfig.php';

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <?php if($_SESSION['sessionID']  == "admin@project2.compassword123"){ ?>
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
                <form id="add-issue" method="post">
                    <h2>Create Issue</h2>

                    <label>Title</label>
                    <input id="add-issue-title" type="text" name="title" required>
                    
                    <label>Description</label>
                    <input id="add-issue-desc" id="desc" type="text" name="desc" required></input>
                    
                    <label>Assigned To</label>
                    <select id="add-issue-assigned" name="assigned">
                    <?php foreach($results as $result){ ?>
                        <?php $name = $result["firstname"]." ".$result["lastname"]; ?>
                        <option value="<?php echo $name?>"><?php echo $name?></option>
                    <?php } ?>
                    </select>

                    <label>Type</label>
                    <select id="add-issue-type" name="type">
                        <option value="Bug">Bug</option>
                        <option value="Proposal">Proposal</option>
                        <option value="Task">Task</option>
                    </select>

                    <label>Priority</label>
                    <select id="add-issue-priority" name="priority">
                        <option value="Major">Major</option>
                        <option value="Minor">Minor</option>
                        <option value="Critical">Critical</option>
                    </select>
                    <button id="issueSubmit" name="newIssue" type="button">Submit</button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $.getScript("js/main.js");
    </script>
