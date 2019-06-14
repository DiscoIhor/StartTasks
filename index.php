<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);


require_once 'routes.php';

$newrouts=new Routes($_SERVER['REQUEST_URI']);  // create an Object
$newrouts->checkUrl($_SERVER['REQUEST_URI']);   // Check URL ending and return it

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" type="text/css" href="firststyle.css" media="all">
</head>
<body>
    <header>
        <div class="logo">
            <a href="main">
                <img alt="logotype" src="gb.png">
            </a>
        </div>
        <div class="contacts">
            <p>
                +380978477171
            </p>
            <p>
                IgorsBusters@gmail.com
            </p>
            <p>
                ул. Великих Гавнарей, 10
            </p>
        </div>

        <div class="container">
            <nav>
                <ul>
                    <li>
                        <a href="login">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="nav">
    </div>
    <div class="content">
    <?php if($_SERVER['REQUEST_URI'] == '/login'){ include 'login.php'; }   ?>
    </div>
    <div id="sidebar">

    </div>
    <div id="footer">

    </div>

</body>
<footer>


</footer>
</html>
