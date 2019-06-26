Hunson Abadeer
<!DOCTYPE html>
<html>
<head>
    <script src="./jquery-3.4.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="task1.css" media="all">


</head>
<body>

<div class="div1" onmousemove="myFunction(event)">
    <div class="div2" onmouseenter="runDiv(this)"></div>
</div>

<div id="log"></div>

<script>
    $( document ).on( "mousemove", function( event ) {
        $( "#log" ).text( "pageX: " + event.pageX + ", pageY: " + event.pageY );
    });
</script>

<p id="demo"></p>

<script>
    var div = document.getElementsByClassName('div2');
    var borders = document.getElementsByClassName('div1');
    var div1coord = div.getBoundingClientRect();
    var bigdivcoord = borders.getBoundingClientRect();
        x = div1coord.left;
        xb = bigdivcoord.left;
        y = div1coord.top;
        yb = bigdivcoord.top;
        w = div1coord.width;
        wb = bigdivcoord.width;
        h = div1coord.height;
        wh = bigdivcoord.height;




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
