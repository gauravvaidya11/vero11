var commonJS = function () {
    var ajx;
    var multi_ajx;
    var commonJS = {
        init: function () {
            this.backToTop();
        },
      
        backToTop: function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                //$('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 1000);
                return false;
            });
            //$('#back-to-top').tooltip('show');
        },

    };
    $(function () {
        commonJS.init();
    });
    return commonJS;
}();