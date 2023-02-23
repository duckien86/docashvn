$(document).keyup(function(e) {
    if (e.key === "Escape" && $('.modal').is(':visible')) {
        $('.modal').modal('hide');
    }
});