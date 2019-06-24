<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body align="center">
<form action="task2.php" method="get">
    Введите время
    <input type="text" name="input">
    <input type="submit" name="sbmt" value="расчитать">
</form>
</body>
</html>

<?php
$arr = array(
    [
        "x" => 0,
        "y" => 1,
        "v" => 2.
    ],
    [
        "x" => 6,
        "y" => 6,
        "v" => 4.
    ],
    [
        "x" => 73,
        "y" => 73,
        "v" => 55.
    ],
);

$i = 0;

foreach ($arr as $data) {
    $x[$i] = $data['x'];
    $y[$i] = $data['y'];
    $v[$i] = $data['v'];
    $i++;
}

for ($i = 0; $i < count($x) - 1; $i++) {
    $dist[$i] = round(sqrt((pow(($x[$i] - $x[$i + 1]), 2) + pow(($y[$i] - $y[$i + 1]), 2))), 2, PHP_ROUND_HALF_UP);
    $t[$i] = round(($dist[$i] / $v[$i]), 2, PHP_ROUND_HALF_UP);
    if ($_GET['input'] === '0') {
        echo "Вы стоите на месте";
    } elseif ($_GET['input'] > 0 && $_GET['input'] < $t[$i]) {
        echo "Вы проехали " . $_GET['input'] * $v[$i] . " клтк";
        die;
    } else {
        echo "Вы проехали " . $_GET['input'] * $v[$i + 1] . " клтк";
        die;
    }
}


/*
 *      "x1" => "0",
        "y1" => "1",
        "v1" => "2",
        "x2" => "6",
        "y2" => "6",
        "v2" => "4",
        "x3" => "73",
        "y3" => "73",
        "v3" => "55",
 *
var_dump($arr);
$dist1 = round(sqrt((pow(($arr['x2'] - $arr['x1']), 2) + pow(($arr['y2'] - $arr['y1']), 2))), 2, PHP_ROUND_HALF_UP);

$dist2 = round(sqrt(pow(($arr['x3'] - $arr['x2']), 2) + pow(($arr['y3'] - $arr['y2']), 2)), 2, PHP_ROUND_HALF_UP);

$t1 = $dist1 / $arr['v1'];

$t2 = $dist2 / $arr['v2'];

if ($_GET['input'] === '0') {
    echo "Вы стоите на месте";
} elseif ($_GET['input'] > 0 && $_GET['input'] <= $t1) {
    echo "вы проехали " . ($_GET['input'] * $arr['v1']) . " клетки";
} elseif ($_GET['input'] > $t1 && $_GET['input'] <= $t2) {
    echo "вы проехали " . ($_GET['input'] * $arr['v2']) . " клеток";
} elseif ($_GET['input'] > $t2) {
    echo "вы проехали " . ($_GET['input'] * $arr['v3']) . " клеток";
}
*/

?>
