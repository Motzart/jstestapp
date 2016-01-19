
var routes = {};

function route (path, templateId, controller) {
    routes[path] = {templateId: templateId, controller: controller};
}

var el = null;
function router () {

    el = el || document.getElementById('album');

    var url = location.hash.slice(1) || '/';

    var route = routes[url];

    if (el && route.controller) {

        route.templateId;
        new route.controller();
    }
}

window.addEventListener('hashchange', router);
window.addEventListener('load', router);


route('/', 'home', function () {
    var source = $('#all-albums').html();
    var template = Handlebars.compile(source);
    var html = template(data);
    $('#album').html(html);
});

route('/add', 'add', function () {
    var source = $('#add-albums').html();
    var template = Handlebars.compile(source);
    var html = template(data);
    $('#album').html(html);
});


var data = { updates : [
    {
        id : 1,
        title: 'title album',
        type: 'type album',
        image: 'image album'
    },
    {
        id : 2,
        title: 'title album2',
        type: 'type album2',
        image: 'image album2'
    },
    {
        id : 3,
        title: 'title album3',
        type: 'type album3',
        image: 'image album3'
    },
    {
        id : 4,
        title: 'title album4',
        type: 'type album4',
        image: 'image album4'
    }
]};