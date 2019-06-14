<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);


//require_once 'routes.php';
//$newrouts = new Routes($_SERVER['REQUEST_URI']);  // create an Object
//$newrouts->checkUrl($_SERVER['REQUEST_URI']);   // Check URL ending and return it

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <form method="post" class="textform"
        ">
        <input type="text" name="title" value="<?php if (isset($_POST['title'])) {
            echo $_POST['title'];
        } ?>" required>
        <p><textarea rows="10" cols="45" name="text" required></textarea></p>
        <p>
            <button onclick="sendMessege" value="sMes">Send</button>
        </p>
        <input type="file" name="img">
        </form>

    </div>
    <div class="sidebar">
        <div class="maswin">
            <?php
            $dbh = new PDO ('mysql:host=localhost;dbname=user', 'igor', 'disc0teka');
            $slkt = $dbh->prepare('SELECT * FROM client');
            $slkt->execute();
            $rows = $slkt->fetchAll(PDO::FETCH_ASSOC);
            $jsonstring = json_encode($rows);
            try {
                if (isset($_POST['text']) && isset($_POST['title']) && isset($_POST['img'])) {
                    $ins = $dbh->prepare('INSERT INTO  client (content,image,name) VALUES (:content,:image,:name )');
                    $ins->bindValue(':content', $_POST['text'], PDO::PARAM_STR_CHAR);
                    $ins->bindValue(':image', $_POST['img'], PDO::PARAM_STR_CHAR);
                    $ins->bindValue(':name', $_POST['title'], PDO::PARAM_STR_CHAR);
                    $ins->execute();
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            /*
            foreach ($rows as $scndvl) {
                echo $scndvl['name']."<br>";
                echo $scndvl['content']."<br>";
            }
            */
            ?>
            <script type="text/javascript">
                var data = <?php echo $jsonstring ?>;
                for (var key in data) {
                    document.write(JSON.stringify(data[key]['name']) + ": <br>");
                    document.write(JSON.stringify(data[key]['content']) + " <br>");
                    out.innerHTML += data['name'];
                    out.innerHTML += data['content'];
                    function sendMessege() {
                        <?php
                            /*
                        foreach ($rows as $scndvl) {
                            echo $scndvl['name']."<br>";
                            echo $scndvl['content']."<br>";
                        }
                            */
                        ?>
                    }
                }
            </script>
        </div>
    </div>
</main>
<footer>

</footer>
</body>
</html>


