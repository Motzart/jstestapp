<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/handlebars-v4.0.5.js"></script

    <meta charset="UTF-8">
    <title>Album</title>
</head>
<body>


<div class="container">
    <h1><a href="#">All Albums</a></h1>
    <div id="album"></div>
</div>


<div id="slideout">
    <div id="slideout_inner">
        <a href="#/add">+ Add Album</a>
    </div>
</div>

</body>

<script id="all-albums" type="text/x-handlebars-template">
    <div class="row">
        {{#each updates}}
        <div class="col-md-3">
            <h1><a href="#album/{{id}}">{{title}}</a></h1>
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
                <label for="exampleInputPassword1">Author</label>
                <input type="text" class="form-control" id="InputAuthor" placeholder="Author">
            </div>
            <div class="form-group">
                <label for="InputFile">Cover</label>
                <input type="file" id="InputFile">
                <p class="help-block">add cover for album</p>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    mp3
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option2">
                    video
                </label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>

        </form>
    </div>
</script>
</html>