<?php require_once 'header.php'; ?>
<?php require_once 'Validator.php'; ?>
<?php
$validate = new Validator();
if (($validate->ispostrowsRequired($_POST)) == false) {
    echo 'You are not enter your text<br>';
}
$data = $_POST['login'];
$data2 = $_POST['pswrd'];
if (($validate->logReview($data)) == 'true') {
    if ($validate->pasReview($data2) == 'true') {
        require 'mainpage.php';
    } else {
        echo "Your pass entered incorrect <br>";
    }
} else {
    echo "your login is incorrect <br>";
}
?>

<form method="post" class="form">
    <p> Your login : <input type="text" name='login'/></p>
    <p> Your password : <input type="password" name='pswrd'/></p>
    <p><input type="submit" name="send" " value="sin in2" ></p>
</form>