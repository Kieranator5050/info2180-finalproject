<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>final2180 - project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <ul>
            <li><img src="images/bug_report-white-18dp.svg" alt="bug" /></li>
            <li>
                <h3>BugMe Issue Tracker</h3>
            </li>
        </ul>
    </header>

    <aside>
        <!-- Sidebar -->
        <div id="sidebar-contents">
        </div>
    </aside>

    <div id="grid-wrapper">
        <main>
            <!-- Form for Login -->
            <div class="area">
                <form method="post" action="sign-in.php">
                    <h2>User Login</h2>

                    <label>Email</label>
                    <input type="email" name="email" required>
                    
                    <label>Password</label>
                    <input type="password" name="password" required>
                    
                    <button name="login" type="submit">Submit</button>
                </form>
            </div>
        </main>
    </div>

    <script type="text/javascript" src=""></script>
</body>
</html>