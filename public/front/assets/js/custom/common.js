var commonJS = function () {
    var commonJS = {
        init: function () {
            this.handelMenu();
            this.handelMultilanguage();
        },

        handelMenu:function(){
           $('.menuIcnInr').click(function() {
            $('body').addClass('openMenu');
            });
            $('.crossIcnInr ,.overlayBg').click(function() {
                $('body').removeClass('openMenu');
            }); 
        },

        handelMultilanguage:function(){
           $(".language").hide();
            $(".select_bx").show();

            $(document).on("click", ".select_bx", function(){
                $(".language").slideToggle();
            });

            $(document).on("click", ".sel_country", function(){
                $('#loading').show();
                var html = $(this).html();
                $('#select_bx').html(html);
                var dada_lang = $(this).attr('dada-lang');
                
                $.ajax({
                    type:"POST",
                    url : BASE_URL + "auths/auth/switchLanguage",
                    data : [{name: csrf_name, value: csrf_token}, {name: 'language', value: dada_lang}],
                    success : function(response) {
                        window.location.href = window.location.href;
                        $('#loading').hide();
                    },       
                }); 
       
            }); 
        },
            

    };
    $(function () {
        commonJS.init();
    });
    return commonJS;
}();