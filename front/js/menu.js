$(document).ready(function () {
    var i = 0;
    $(".option").css("display", "none");
    $("#delete").click(function(event) {
        if(!confirm('Êtes-vous sûr de vouloir supprimer votre compte?')) {
            event.preventDefault();
        }
    });
    $("#drop").click(function() {
        if (i % 2 === 0) {
            $(".option").css("display", "block");
            $(this).text("Menu ⇑");
        } else {
            $(this).text("Menu ⇓");
            $(".option").css("display", "none");
        }
        i += 1;
    });
});