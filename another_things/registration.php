<?php require_once 'header.php'; ?>
<?php require_once 'Validator.php'; ?>
<?php require_once 'user.php'; ?>

<form method="post" class="form">
    <p> Your name : <input type="text" name='name'/></p>
    <p> Your city: <input type="text" name='city'/></p>
    <p> Your age: <input type="text" name='age'/></p>
    <p> Your login : <input type="text" name='login'/></p>
    <p> Your password: <input type="text" name='pswrd'/></p>
    <p> Confirm password: <input type="text" name='pswrd2'/></p>
    <p><input type="submit" name="Send"></p>
</form>

<?php
$user1 = new User($_POST['name'], $_POST['age'], $_POST['city'], $_POST['login'], $_POST['pswrd'], $_POST['pswrd2']);
/*$name=$user1->name;
$age=$user1->age;
$city=$user1->city;*/
/*
 *  Create obj as user
 */
$validate = new Validator();
if (($validate->ispostrowsRequired($_POST)) == false) {
    echo 'You are not enter your text<br>';
} else {
}
?>