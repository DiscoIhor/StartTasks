<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);


require_once 'routes.php';

$newrouts=new Routes($_SERVER['REQUEST_URI']);
$newrouts->checkUrl($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p><a href="task1.php"> TASK1 </a></p>
<p><a href="task2.php"> TASK2 </a></p>
<p><a href="task3.php"> TASK3 </a></p>
<p><a href="task4.php"> TASK4 </a></p>
<p><a href="task5.html"> TASK5 </a></p>
<p><a href="task6.php"> TASK6 </a></p>
<p><a href="task7.php"> TASK7 </a></p>
<p><a href="task1.php"> TASK8 </a></p>
</body>
</html>
