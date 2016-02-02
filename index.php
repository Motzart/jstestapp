<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/handlebars-v4.0.5.js"></script>
    <script src="js/app.js"></script>

    <meta charset="UTF-8">
    <title>Album</title>
</head>
<body>

<div class="container">
    <h1><a id="link" href="/">All Albums</a></h1>
    <div id="album"></div>
</div>


<div id="slideout">
    <div id="slideout_inner">
        <a id="link" href="/add" class="btn btn-default btn-block">Add Album</a>
        <button onClick="clearLocalStorage()" type="submit" class="btn btn-default btn-block">Clear all album</button>
    </div>
</div>

</body>

<script id="all-albums" type="text/x-handlebars-template">
    <div class="row">
        {{#each updates}}
        <div class="col-md-3">
            <h1><a id="link" href="/album/{{id}}">{{title}}</a></h1>
            <h3>{{author}}</h3>
            <h3>{{type}}</h3>
            <div class="body">
                {{image}}
            </div>
        </div>
        {{/each}}
    </div>
</script>
<script id="add-albums" type="text/x-handlebars-template">
    <div class="row">
        <form>
            <div class="form-group">
                <label for="InputTitle">Album Title</label>
                <input type="text" class="form-control" id="InputTitle" placeholder="Title">
            </div>
            <div class="form-group">
                <label >Author</label>
                <input type="text" class="form-control" id="InputAuthor" placeholder="Author">
            </div>
            <div class="text-center">

            </div>
            <div class="form-group">
                <label for="InputFile">Cover</label>
                <input type="file" name="cover" id="cover">
                <p class="help-block">add cover for album</p>
            </div>

            <div id="imageCover" class="text-center"></div>
            <button id="submitForm" type="submit" class="btn btn-default">Submit</button>

        </form>
    </div>

</script>
<script id="single-album" type="text/x-handlebars-template">
    <div class="row">
        <div class="col-md-12">
            <h2>Single Album</h2>
            <h1>{{title}}</h1>
            <h3>{{author}}</h3>
            <div class="body">
                {{image}}
            </div>
        </div>
    </div>
</script>
<script>
    var nId = 1;
    $('body').on('click', '#submitForm', function (e) {
        e.preventDefault();
        nId++;
        var form = $('#album-form');
        var Title = $('#InputTitle').val();
        var Author = $('#InputAuthor').val();


        if ($("#InputTitle").val() == '') {

            $('#alert').html("<strong>Warning!</strong>You left title entry");
            $('#alert').fadeIn().delay(1000).fadeOut();
            return false;
        }
        form.trigger('reset');

        var fileInput = $('#cover')[0];
        var file = fileInput.files[0];
        var reader = new FileReader();
        var albumImage;

        reader.onload = function (e) {
            var img = new Image();
            img.src = reader.result;
            albumImage = reader.result; //stores the image to localStorage
        };

        reader.readAsDataURL(file);

        var album = {
            id: nId,
            title: Title,
            author: Author,
            file: albumImage
        };

        var jsonAlbum = JSON.stringify(album);
        localStorage.setItem(nId, jsonAlbum);
        return false;
    });

    function getAlbum(id) {
        return localStorage.getItem(id);
    }

    function clearLocalStorage() {
        window.localStorage.clear();
        location.reload();
        return false;
    }

</script>
</html>