Hunson Abadeer
<!DOCTYPE html>
<html>
<head>
    <script src="./jquery-3.4.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="task1.css" media="all">


</head>
<body>

<div id="div1">
    <div id="div2"></div>
</div>

<div id="log"></div>

<script>
    $(document).on("mousemove", function (event) {
        $("#log").text("pageX: " + event.pageX + ", pageY: " + event.pageY);
    });
</script>

<p id="demo"></p>

<script>
    $(document).on("mousemove", function (event) {
        var x_div = $("#div2").offset().left;
        var y_div = $("#div2").offset().top;
        var y = event.pageY;
        var x = event.pageX;
        if (x >= x_div && x <= x_div + 85 && y >= y_div && y <= (y_div + 85)) {
            document.getElementById("div2").style.left = x;
            document.getElementById("div2").style.top = y;
            document.getElementById("div2").style.transform = "translate(-" + x + ",-" + y + ")";
        }
    })
</script>
</body>
</html>

<?php
?>
