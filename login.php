<form method="post" class="form">
    <p> Enter your login : <input type="text" name='login'/></p>
    <p> Enter your password : <input type="password" name='pas'/></p>
    <a href="createac.php">Create accaunt</a>
    <p><input type="submit" name="send" value="login"></p>
</form>
<?php
$dbh = new PDO('mysql:host=localhost;dbname=user', 'igor', 'disc0teka');
$stmt = $dbh->prepare("SELECT * FROM users ");
$stmt->execute();
$rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
try {
    if (is_null($_POST['login']) || $_POST['login'] == '') {
        echo "log pystoi <br>";
    } elseif (is_null($_POST['pas']) || $_POST['pas'] == '') {
        echo "pas pystoi";
    } else {
        foreach ($rows as $value) {
            if ($value['login'] == $_POST['login'] && $value['pas'] == $_POST['pas']) {
                echo "jadok <br>";
            }
        }
    }
}
catch (PDOException $e) {
    echo $e->getMessage();
}
?>
