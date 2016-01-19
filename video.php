<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/handlebars-v4.0.5.js"></script

    <meta charset="UTF-8">
    <title>video</title>
</head>
<body>



<div id="slideout">
    <div id="slideout_inner">
        <a href="#/add">+ Add Album</a>
    </div>
</div>


<script>
    navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
    navigator.getUserMedia({ video : true }, function (){}, function(){});

</script>
<video autoplay id="video"></video>
</body>
</html>