<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="task5.css" media="all">
</head>
<body align="center">
<form action="/" method="get">
    Enter currency : <input type="text" name="input" />
    Select currency :
    <select name="dropdown">
        <option value="USD">Dollar</option>
        <option value="CNY">Юань</option>
        <option value="EUR">Евро</option>
        <option value="UAH">Гривна</option>>
    </select>
    <input type="submit" name="sbmt" value="Convert">
</form>
</body>
</html>

<?php
define("LINK", 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json');
$data = file_get_contents(LINK); //get data from link datas
$courses = json_decode($data, true); // make array from obj
$cc_dropdown = $_GET['dropdown'];
foreach ($courses as $key){
    if ($key['cc'] == 'USD'){
        $d=$key['rate'];
    }
}
if (isset($_GET['sbmt'])) {
    foreach ($courses as $values) {
        if ($values['cc'] == $cc_dropdown) {
            $sum = (($_GET['input'] * $d) / $values['rate']);
            echo round($sum, 2, PHP_ROUND_HALF_UP) . "<br>";
        }
    }
    if ($cc_dropdown == "UAH") {
        $sum = ($_GET['input'] * $d);
        echo round($sum, 2, PHP_ROUND_HALF_UP) . "<br>";
    }
}
        /*
        if (array_key_exists($cc_dropdown, $values['cc'])) {
            echo $sum = round(($_GET['input'] * $values['rate']), 2, PHP_ROUND_HALF_UP) . "<br>"; At first i whant to do like this
            echo $sum;
        }
        */
?>
