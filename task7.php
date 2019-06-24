<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


</body>
</html>

<?php
define("IDY", 'AIzaSyBvuXwcmFj5nAS5ScWiymzyw2MdGzsjGYY');

function youtube_video_statistics($video_id) {
    $json = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=" . $video_id . "&key=". IDY );
    $jsonData = json_decode($json);
    $views = $jsonData->items[0]->statistics->viewCount;
    return $views;
}
echo "Now video gangam style have viewed ".youtube_video_statistics('9bZkp7q19f0')." times";
?>