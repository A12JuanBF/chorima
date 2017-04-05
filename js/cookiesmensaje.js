$(document).ready(function() {
    var cookie = $.cookie('cookiechr');
    $("#mensajecookies").click(function(e) {
        e.preventDefault();
        crearcookie();
        popbox3();
    });
    if (cookie == 'aceptado')
    {
        popbox3();
    }

});


function popbox3() {
    $('#overbox3').toggle();
}
function crearcookie() {
    $.cookie('cookiechr', 'aceptado', {expires: 1, path: '/'});
}

