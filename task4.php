<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);

$dbh = new PDO ('mysql:host=localhost;dbname=Task4', 'igor', 'disc0teka');
$slkt = $dbh->prepare('SELECT users_id,COUNT(*) AS total FROM Product_coment GROUP BY users_id ORDER BY total DESC LIMIT ' . 10);
$slktuser = $dbh->prepare('SELECT * FROM users');
$slktuser->execute();
$slktuser = $slktuser->fetchAll(PDO::FETCH_ASSOC);
$arr = $slkt;
$arr->execute();
$rows = $arr->fetchall(PDO::FETCH_ASSOC);
$uid = array();

$i = 0;
foreach ($rows as $user_id) {
    $uid[$i] = $user_id['users_id'];
    foreach ($slktuser as $id) {
        if ($id['id'] == $uid[$i]) {
            echo "Top " . ($i + 1) . " is " . $id['name'] . "<br>";
        }
    }
    $i++;

}
echo "<br>";
echo "<br>";
$slcoments = $dbh->prepare('SELECT product_id, COUNT(*) FROM Product_coment GROUP BY product_id');
$slcoments->execute();
$slcoments = $slcoments->fetchAll(PDO::FETCH_ASSOC);
$count_rate = $dbh->prepare('SELECT product_id, SUM(rate) FROM `Product_rate` GROUP BY product_id');
$count_rate->execute();
$count_rate = $count_rate->fetchAll(PDO::FETCH_ASSOC);
$count_rate_final = $dbh->prepare('SELECT product_id, COUNT(*) FROM Product_rate GROUP BY product_id');
$count_rate_final->execute();
$count_rate_final = $count_rate_final->fetchAll(PDO::FETCH_ASSOC);
$rate_array = array();

$i = 0;
foreach ($count_rate_final as $skey) {
    $rate_array[$i] = $skey['product_id'];
    foreach ($count_rate as $item) {
        if ($item['product_id'] == $rate_array[$i]) {
            echo "Product's rate with id = " . $item['product_id'] . " is " . ($item['SUM(rate)'] / $skey['COUNT(*)']) . "<br>";
        }
    }
    $i++;
}

/*$product = $dbh->prepare('SELECT name FROM `Product` WHERE id = ');
$product->execute();
$product = $product->fetchAll(PDO::FETCH_ASSOC);*/
?>

<!---Task4

CREATE DATABASE Task4;

USE Task4;

CREATE TABLE users (
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id),
name VARCHAR(40)
)

CREATE TABLE Product (
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id),
name VARCHAR(40)
)

CREATE TABLE Product_coment (
users_id INT NOT NULL,
product_id INT NOT NULL,
rate INT (40),
FOREIGN KEY (users_id) REFERENCES users (id),
FOREIGN KEY (product_id) REFERENCES Product(id)
)

CREATE TABLE Product_rate (
users_id INT NOT NULL,
product_id INT NOT NULL,
rate INT (40),
FOREIGN KEY (users_id) REFERENCES users (id),
FOREIGN KEY (product_id) REFERENCES Product(id)
)

INSERT INTO `users` (`id`, `name`) VALUES ('1', 'Igor');

INSERT INTO `users` (`name`) VALUES ('Alex');

INSERT INTO `Product` (`name`) VALUES ('Pila');

INSERT INTO `Product` (`name`) VALUES ('CD');

INSERT INTO `Product_coment` (`users_id`, `product_id`, `text`) VALUES ('1', '2', 'Cool'), ('2', '2', 'Very Very Very amazing');

INSERT INTO `Product_rate` (`users_id`, `product_id`, `rate`) VALUES ('3', '1', '7'), ('1', '2', '3');


--->

