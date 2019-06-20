<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);

$dbh = new PDO ('mysql:host=localhost;dbname=user', 'igor', 'disc0teka');
$slkt = $dbh->prepare('SELECT * FROM client');
$slkt->execute();
$rows = $slkt->fetchAll(PDO::FETCH_ASSOC);


//require_once 'routes.php';
//$newrouts = new Routes($_SERVER['REQUEST_URI']);  // create an Object
//$newrouts->checkUrl($_SERVER['REQUEST_URI']);   // Check URL ending and return it

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./jquery-3.4.1.min.js"></script>
    <!--<script src="./task3.js"></script>-->
    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" type="text/css" href="task3.css" media="all">
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
<main class="main">
    <div class="content">
        <form method="post" class="textform" >
            <input id="title" type="text" name="title" placeholder="Your name">
            <p>
                <textarea id="textform" rows="10" cols="45" name="textform" placeholder="Your text" required></textarea>
            </p>
            <p>
                <input type="submit" id="btn" value="Send">
            </p>
            <input type="file" id="img" name="img">
        </form>

    </div>
    <div class="sidebar">
        <div class="maswin">
            <?php
            $i = 0;
            foreach ($rows as $scndvl) {
                echo $scndvl['name'] . "<br>";
                echo $scndvl['content'] . "<br>";
                ?>
                <button value="<?php echo $i++; ?>">delete</button>
                <?php
                echo "_______________________________________________________________________________<br>";
            }
            if (isset($_POST['title']) && isset($_POST['textform'])) {
                echo $_POST['title'] . "<br>";
                echo $_POST['textform'] . "<br>";
                ?>
                <button value="new">delete</button>
                <?php
                echo "_______________________________________________________________________________<br>";
            }
            ?>
        </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>
<script>
    $('#btn').click(function () {
        var title = $('#title').val();
        var textform = $('#textform').val();
        $.ajax({
            type: 'POST',
            url: 'task3.php',
            data: {title: title, textform: textform},
            success: function (response) {
                $('#result').html(response);
            }
        });
    });
</script>
<?php
if (isset($_POST['title']) && isset($_POST['textform'])) {
    $title = $_POST['title'];
    $textform = $_POST['textform'];
    $img_from_form = $_POST['img'];
    $ins = $dbh->prepare('INSERT INTO  client (content,image,name) VALUES (:content,:image,:name )');
    $ins->bindValue(':content', $textform, PDO::PARAM_STR_CHAR);
    $ins->bindValue(':image', $img_from_form, PDO::PARAM_STR_CHAR);
    $ins->bindValue(':name', $title, PDO::PARAM_STR_CHAR);
    $ins->execute();
}
?>


