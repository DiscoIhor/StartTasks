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

<script>
        let container = document.getElementById('div1');
        let element = document.getElementById('div2');

        function randomMove(min, max) {
            return Math.floor(Math.random() * max + min);
        }

        function changePosition(e, element) {
            if(Math.abs(e.clientX - (element.offsetLeft + element.offsetWidth / 2)) < 81 || Math.abs(e.clientY - (element.offsetTop + element.offsetHeight / 2)) < 81) {
                element.style.left = randomMove(100, container.clientWidth - element.offsetLeft)+"px";
                element.style.top = randomMove(100, container.clientHeight - element.offsetTop)+"px";
                element.style.transition = '0.1s';
            }
        }

        container.onmousemove = (e) => {

            changePosition(e, element);

        };
</script>
</body>
</html>
