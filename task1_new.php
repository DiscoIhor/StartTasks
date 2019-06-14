Hunson Abadeer
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="task1.css" media="all">


</head>
<body>

<div class="div1" onmousemove="myFunction(event)">
    <div class="div2" onmouseenter="runDiv(this)"></div>
</div>

<p id="demo"></p>

<script>
    var div = document.getElementsByClassName("div2");



    document.onmousemove = function runDiv () {
        var y = event.clientX * 70 / window.innerHeight + "%";
        var x = event.clientY * 200 / window.innerWidth + "%";

        for (var i = 0; i < 2; i++) {
            div[i].style.left = y;
            div[i].style.top = x;
            div[i].style.transform = "translate(-"+x+",-"+y+")";
        }
    }

</script>
</body>
</html>

<?php
?>
