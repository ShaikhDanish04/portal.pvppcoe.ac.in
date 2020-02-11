//reset post on reload
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

$(window).resize(function () {
    //content view height script
    $('.content-view').css("height", "calc(100% - " + Number($('.banner').outerHeight() + $('.top-bar').outerHeight()) + "px)");
    $('.content').css("height", "calc(" + Number($(window).outerHeight()) + "px - " + Number($('.banner').outerHeight() + $('.top-bar').outerHeight()) + "px + 1px)");

    if (innerWidth <= 996) {
        $('.side,.content').removeClass('stick');
    }
})

$(document).ready(function () {
    
    //content view height script
    $('.content-view').css("height", "calc(100% - " + Number($('.banner').outerHeight() + $('.top-bar').outerHeight()) + "px)");
    $('.content').css("height", "calc(" + Number($(window).outerHeight()) + "px - " + Number($('.banner').outerHeight() + $('.top-bar').outerHeight()) + "px + 1px)");


    //head card dropdown
    $('.head-card [data-toggle="collapse"]').on('click', function (e) {
        $('.dropdown-item').removeClass('active');

        $(this).addClass('active');
        if ($(this).index('[data-toggle="collapse"]') == $('.collapse.show').index('.collapse')) {
            e.stopPropagation();
        }
    });
});

$(document).click(function () {

    //custom input box
    // $('.input-handler').on('click keyup', function () {

    //     $(this).find('input,select,textarea').focus(function () {
    //         $(this).addClass("label-up");
    //     });

    //     $(this).find('input,select,textarea').focus();

    //     $(this).find('input,select,textarea').on('keyup blur', function () {
    //         if ($(this).val() != '') {
    //             $(this).addClass("label-up");
    //         } else {
    //             $(this).removeClass("label-up");
    //         }
    //     })
    // })

})

