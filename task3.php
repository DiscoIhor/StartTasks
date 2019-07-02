<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);
$dbh = new PDO ('mysql:host=localhost;dbname=user', 'igor', 'disc0teka');
$slkt = $dbh->prepare('SELECT * FROM client');
$slkt->execute();
$rows = $slkt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./jquery-3.4.1.min.js"></script>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" type="text/css" href="task3.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
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
            <input type="file" id="image" name="image">
        </form>

    </div>
    <div class="sidebar">
        <div class="maswin">
            <?php
            if (isset($_POST['delbtn'])) {
                $del = $dbh->prepare('DELETE FROM `client` WHERE id =' . $_POST['delbtn']);
                $del->execute();
            }
            if (isset($_POST)) {
                foreach ($rows as $scndvl) {
                    echo "<table><td>" . $scndvl['name'] . "</td></table>";
                    echo "<table><td>" . $scndvl['content'] . "</td></table>";
                    ?>
                    <form method="post">
                        <button name="delbtn" id="delbtn" value="<?php echo $scndvl['id']; ?>">delete</button>
                        <br>
                        <button name="like" id="like" class="fa fa-thumbs-up"
                                value="<?php echo $scndvl['id']; ?>"> <?php echo $scndvl['like']; ?> </button>
                        <button name="dislike" id="like" class="fa fa-thumbs-down"
                                value="<?php echo $scndvl['id']; ?>"> <?php echo $scndvl['dislike']; ?> </button>
                    </form>
                    <?php
                    echo "_______________________________________________________________________________<br>";
                }
            }
            if (isset($_POST['title']) && isset($_POST['textform'])) {
                echo "<table><td>" . $_POST['title'] . "</td></table>";
                echo "<table><td>" . $_POST['textform'] . "</td></table>";
                ?>
                <form method="post">
                    <button value="<?php echo 'new'; ?>">delete</button>
                    <br>
                    <br>
                    <button class="fa fa-thumbs-up"></button>
                    <button class="fa fa-thumbs-down"></button>
                </form>
                <?php
                echo "_______________________________________________________________________________<br>";
            }
            ?>
        </div>
    </div>
</main>
<footer>
    <script>
        function ajaxRequest(id, title, textform, delbtn, like, dislike) {
            $.ajax({
                type: 'POST',
                url: 'task3.php',
                data: {id: id, title: title, textform: textform, delbtn: delbtn, like: like, dislike: dislike},
                dataType: 'json',
                success: function (response) {
                    console.log(title, textform, delbtn, like, dislike);
                    $('#result').html(response);
                },
                error: function () {
                    console.log("There was an error. Try again please!");
                },
            });
        }

        $('#delbtn').click(function () {
            var delbtn = $('#delbtn').val();
            alert(delbtn);
            ajaxRequest(delbtn);

        });

        $('#btn').click(function () {
            var title = $('#title').val();
            var textform = $('#textform').val();
            ajaxRequest(title, textform);
        })
        $('#like').click(function () {
            var like = $('#like').val();
            ajaxRequest(like);
        })
        $('#dislike').click(function () {
            var dislike = $('#dislike').val();
            ajaxRequest(dislike);
        })
    </script>
</footer>
<img id="myImg" src="setwalls.ru-6896.jpg" alt="Fin" style="width:100%;max-width:300px">
<script src="./task3.js"></script>
</body>
</html>
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
if (isset ($_POST['like'])) {
    $inslike = $dbh->prepare('UPDATE `client` SET `like` = `like` + 1 WHERE id =' . $_POST['like']);
    $inslike->execute();
}
if (isset($_POST['dislike'])) {
    $insdislike = $dbh->prepare('UPDATE `client` SET `dislike` = `dislike` + 1 WHERE id=' . $_POST['dislike']);
    $insdislike->execute();
}
/*var_dump($_POST);*/
echo "<br>";
echo "<br>";
echo "<br>";
/*echo $_POST['like'];*/

?>
<!--CREATE TABLE client (
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id),
title VARCHAR (50),
textform VARCHAR (200),
img VARCHAR (50),
like INT NOT NULL DEFAULT 0,
dislike INT NOT NULL DEFAULT 0
)-->

