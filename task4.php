<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);


$dbh = new PDO ('mysql:host=localhost;dbname=Task4', 'igor', 'disc0teka');
$slkt = $dbh->prepare('SELECT * FROM users');
$slkt2 = $dbh->prepare('SELECT * FROM Product');
$slkt3 = $dbh->prepare('SELECT * FROM Product_coment'); //coments
$slkt4 = $dbh->prepare('SELECT * FROM Product_rate');   //rates
$slkt->execute();
$slkt2->execute();
$slkt3->execute();
$slkt4->execute();
$rows = $slkt->fetchAll(PDO::FETCH_ASSOC);
$rows2 = $slkt2->fetchAll(PDO::FETCH_ASSOC);
$rows3 = $slkt3->fetchAll(PDO::FETCH_ASSOC);
$rows4 = $slkt4->fetchAll(PDO::FETCH_ASSOC);
$count = 0;
foreach ($rows3 as $scndvl) {
    foreach ($rows4 as $value) {
        if ($scndvl['product_id'] == $value['product_id']) {
            $count++;
        }
    }
}
foreach ($rows as $scndvl){
    
}
var_dump($rows);
echo "<br>";
var_dump($rows2);
echo "<br>";
var_dump($rows3);
echo "<br>";
var_dump($rows4);
echo "<br>";
echo $count . "<br>";
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

