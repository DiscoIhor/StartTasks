Hunson Abadeer
<!DOCTYPE html>
<html>
<head>
    <script src="./jquery-3.4.1.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="task1.css" media="all">


</head>
<body>

<div class="div1" id="div1">
    <div class="div2" id="div2"></div>
</div>

<div id="log"></div>

<script>
    $( document ).on( "mousemove", function( event ) {
        $( "#log" ).text( "pageX: " + event.pageX + ", pageY: " + event.pageY );
    });
</script>

<p id="demo"></p>

<script>
    function getCoord() {
        var div = document.getElementById("div2");
        var bigcontainer = document.getElementById("div1");
        var rectbigdiv = bigcontainer.getBoundingClientRect();
        var rectdiv = div.getBoundingClientRect();
        x = rectdiv.left;
        y = rectdiv.top;
        w = rectdiv.width;
        h = rectdiv.height;
        x2 = rectbigdiv.left;
        y2 = rectbigdiv.top;
        w2 = rectbigdiv.width;
        h2 = rectbigdiv.height;
        alert ("Left: " + x + ", Top: " + y + ", Width: " + w + ", Height: " + h);

    }
    document.onmousemove = function runDiv (event) {
        if (event.clientX > x || event.clientX > x + w){

        }
        if (event.clientY > y || event.clientY > y + h){

        }
    }
/*    document.onmousemove = function runDiv () {
        var newy = event.clientX * 70 / window.innerHeight + "%";
        var newx = event.clientY * 200 / window.innerWidth + "%";

        for (var i = 0; i < 2; i++) {
            div[i].style.left = newy;
            div[i].style.top = newy;
            div[i].style.transform = "translate(-"+newx+",-"+newy+")";
        }
    }*/
</script>
<button onclick="getCoord()">Get top-left corner + witdth and height of the element with red border</button>
</body>
</html>

<?php
?>
