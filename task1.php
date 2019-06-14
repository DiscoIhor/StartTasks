<!DOCTYPE html>
<html>
<head>
    <style>
        div {
            width: 100px;
            height: 100px;
            background-color: red;
            position: relative;
            -moz-animation-name: task5;
            -moz-animation-name: 10S;
            -webkit-animation-name: task1;
            -webkit-animation-duration: 4s;
            animation-iteration-count: infinite;
        }

        @-webkit-keyframes task1 {
            0% {
                background-color: red;
                left: 0px;
                top: 0px;
            }
            25% {
                left: 200px;
                top: 0px;
            }
            50% {
                left: 200px;
                top: 200px;
            }
            75% {
                green;
                left: 0px;
                top: 200px;
            }
            100% {
                left: 0px;
                top: 0px;
            }
        }

    </style>
</head>
<body>

<div></div>

</body>
</html>
<?php


?>