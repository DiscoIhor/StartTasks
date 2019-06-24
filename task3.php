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
        <form method="post" class="textform">
            <input id="title" type="text" name="title" placeholder="Enter your name" required>
            <p>
                <textarea id="textform" rows="10" cols="45" name="textform" placeholder="Enter your text"
                          required></textarea>
            </p>
            <p>
                <input type="submit" id="btn" name="send_btn" value="Send">
            </p>
            <input type="file" id="img" name="img">
        </form>

    </div>
    <div class="sidebar">
        <div class="maswin">
            <?php
            $i = 0;
            foreach ($rows as $scndvl) {
                echo "<table><td>" . $scndvl['name'] . "</td></table>";
                echo "<table><td>" . $scndvl['content'] . "</td></table>";
                ?>
                <form method="post">
                <button class="delete_btn" name="del_btn" value="<?php echo $scndvl['id']; ?>">delete</button>
                </form>
                <?php
                echo "_______________________________________________________________________________<br>";
            }
            if (isset($_POST['title']) && isset($_POST['textform'])) {
                echo "<table><td>" . $_POST['title'] . "</td></table>";
                echo "<table><td>" . $_POST['textform'] . "</td></table>";
                ?>
                <form method="post">
                <button  value="<?php echo 'new'; ?>">delete</button>
                </form>
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

    function ajaxRequest(id, title, textform) {
        $.ajax({
            type: 'POST',
            url: 'test.php',
            data: {id: id, title: title, textform: textform},
            dataType : 'json',
            success: function (response) {
                console.log(title,textform);
                $('#result').html(response);
            },
            error: function() {
                console.log("There was an error. Try again please!");
            },
        });
    }

    $('.delete_btn').click(function () {
        var id = $('.delete_btn').val();
        ajaxRequest(id);

    });

    $('#btn').click(function () {
        var title = $('#title').val();
        var textform = $('#textform').val();
        ajaxRequest(title, textform);
    })
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

if (isset($_POST['del_btn'])) {
    $del = $dbh->prepare('DELETE FROM `client` WHERE id =' . $_POST['del_btn']);
    $del->execute();
}


var_dump($_POST);

//boom boom paw

?>


