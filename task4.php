<?php
require_once 'header.php';
error_reporting(E_ALL | E_STRICT);

$arr = array();
$dbh = new PDO ('mysql:host=localhost;dbname=Task4', 'igor', 'disc0teka');

for ($i = 1; $i < 11; $i++) {
    $slkt = $dbh->prepare('SELECT users_id,COUNT(*) AS total FROM Product_coment GROUP BY users_id ORDER BY total DESC LIMIT ' . $i);
    $arr[$i] = $slkt;
    $arr[$i]->execute();
    $rows = $arr[$i]->fetchall(PDO::FETCH_ASSOC);
}

$count_product = $dbh->prepare('SELECT id FROM Product');
$count_product->execute();
$count_product = $count_product->fetchAll(PDO::FETCH_ASSOC);

$i = 0;

foreach ($rows as $key1) {
    $slkt3[$i] = $dbh->prepare("SELECT `name` FROM `users` WHERE `id` = " . $key1['users_id']);
    $slkt3[$i]->execute();
    $rows3[$i] = $slkt3[$i]->fetchAll(PDO::FETCH_ASSOC);
    $i++;
}

$i = 1;

foreach ($rows3 as $value) {
    foreach ($value as $key) {
        echo "Top " . $i . " user is: " . $key['name'] . "<br>";
        $i++;
    }
}

echo "<br>";
echo "<br>";

$count_comments = $dbh->prepare('SELECT product_id, SUM(rate) FROM `Product_rate` GROUP BY product_id');
$count_rate = $dbh->prepare('SELECT product_id, COUNT(*) FROM Product_coment GROUP BY product_id');
$count_rate->execute();
$count_rate = $count_rate->fetchAll(PDO::FETCH_ASSOC);
$count_comments->execute();
$count_comments = $count_comments->fetchAll(PDO::FETCH_ASSOC);
$real_product_rate = $dbh ->prepare('');

$i=0;
$b=0;

foreach ($count_rate as $rate) {
    $count_r[$i]=$rate['COUNT(*)'];
    $count_r_prid[$i]=$rate['product_id'];
    $i++;
}

foreach ($count_comments as $comment) {
    $count_c[$b] = $comment['SUM(rate)'];
    $count_c_prid[$b] = $comment['product_id'];
    $b++;
}

for ($i=0;$i<count($count_product);$i++){
    if (($count_c_prid[$i] = $count_r_prid[$i])){
        $real_comment[$i]=($count_c[$i]+$count_r[$i])/2;
        echo "Средний рейтинг ".($i+1)." товара ".$real_comment[$i]."<br>";
    }
}
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

