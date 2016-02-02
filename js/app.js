var Router = {
    URL: window.location.href,

    routes: {
        "http://album.loc/": "indexPage",
        "http://album.loc/add": "addPage",
        "http://album.loc/album/:id": "albumPage"
    },

    init: function () {
        this._routes = [];
        for (var route in this.routes) {
            var methodName = this.routes[route];
            this._routes.push({
                pattern: new RegExp('^' + route.replace(/:\w+/, '(\\w+)') + '$'),
                callback: this[methodName]
            });
        }
    },
    nav: function (path) {
        var i = this._routes.length;
        while (i--) {
            var args = path.match(this._routes[i].pattern);
            console.log(args);
            if (args) {
                this._routes[i].callback.apply(this, args.slice(1));
            }
        }
    },

    indexPage: function () {
        var source = $('#all-albums').html();
        var template = Handlebars.compile(source);
        var html = template(getAllAlbumFromLS());
        $('#album').html(html);
    },

    addPage: function () {
        var source = $('#add-albums').html();
        var template = Handlebars.compile(source);
        $('#album').html(template);
    },

    albumPage: function (id) {
        var source = $('#single-album').html();
        var template = Handlebars.compile(source);
        console.log(localStorage.getItem(id));
        var html = template(getOneAlbumFromLS(id));

        $('#album').html(html);

    }
};

function getOneAlbumFromLS(id) {
    return JSON.parse(localStorage.getItem(id))
}

function getAllAlbumFromLS() {

    var updates = [];

    for (var i = 0; i < localStorage.length; i++) {
        var key = localStorage.key(i);
        var obj = JSON.parse(localStorage.getItem(key));
        updates.push(obj);
    }

    return {updates: updates};
}

$(document).ready(function () {
    Router.init();
    Router.nav(window.location.href);
    $("body").on("click", "a#link", function (evt) {
        Router.nav(evt.currentTarget.href);
        evt.preventDefault();
    });
});
