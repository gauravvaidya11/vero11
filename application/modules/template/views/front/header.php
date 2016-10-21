<script src="<?php echo BASE_URL; ?>public/front/assets/js/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>public/front/assets/bootbox/bootbox.min.js"></script>  
<?php 
if($this->session->userdata("player_id")){ ?>
<section class="topMenuHead">
    <div class="container">
        <div class="loginTop"><a href="<?php echo BASE_URL; ?>logout"><?php echo lang("profile_logout_button"); ?> <span><i class="fa fa-sign-out" aria-hidden="true"></i></span></a></div>
            <div class="custom_language_dropdownl"> 
                <?php
                $language = getLanguages();
                $lang_id = 'english';
                if ($this->session->userdata('site_language')) {
                    $lang_id = $this->session->userdata('site_language');
                }

                $lang_option = '';
                $sel_lang = 'Select Language';
                foreach ($language as $key => $value) {
                    $lang = '';
                    $lang_option .= '<li class="sel_country" rel="' . $value['id'] . '" dada-lang="'.$value['lang_name'].'">';
                    $lang = '<a href="javascript:void(0);"><img src="' . BASE_URL . 'public/uploads/language/flag/thumb/' . $value['lang_flag'] . '" alt=""><span> ' . ucfirst($value['lang_name']) . '</span></a>';

                    if ($lang_id == $value['lang_name']) {
                        $sel_lang = $lang;
                    }
                    $lang_option .= $lang;
                    $lang_option .= '</li>';
                }
                ?>
                <div id="select_bx" class="select_bx"><?php echo $sel_lang; ?></div>
                <ul id="language_code" class="language">
                    <?php echo $lang_option; ?>
                </ul>

            </div>
        
    </div>
</section>
<header> 
    <div class="profile_banner"><img src="<?php echo BASE_URL; ?>public/front/assets/images/profile_banner].jpg"/></div>
    <div class="container menu">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>about-us" class="dem-3"><?php echo lang("about_us"); ?></a></li>
                    <li><a href="<?php echo BASE_URL; ?>contact-us" class="dem-3"><?php echo lang("common_contact_us"); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<?php }else { ?>

    <section class="topMenuHead">
        <div class="container">
            <div class="loginTop"><a href="<?php echo BASE_URL; ?>login" class="dem-3"><?php echo lang("login_form_title"); ?></a></div>

            <div class="custom_language_dropdownl"> 
                <?php
                $language = getLanguages();
                $lang_id = 'english';
                if ($this->session->userdata('site_language')) {
                    $lang_id = $this->session->userdata('site_language');
                }

                $lang_option = '';
                $sel_lang = 'Select Language';
                foreach ($language as $key => $value) {
                    $lang = '';
                    $lang_option .= '<li class="sel_country" rel="' . $value['id'] . '" dada-lang="'.$value['lang_name'].'">';
                    $lang = '<a href="javascript:void(0);"><img src="' . BASE_URL . 'public/uploads/language/flag/thumb/' . $value['lang_flag'] . '" alt=""><span> ' . ucfirst($value['lang_name']) . '</span></a>';

                    if ($lang_id == $value['lang_name']) {
                        $sel_lang = $lang;
                    }
                    $lang_option .= $lang;
                    $lang_option .= '</li>';
                }
                ?>
                <div id="select_bx" class="select_bx"><?php echo $sel_lang; ?></div>
                <ul id="language_code" class="language">
                    <?php echo $lang_option; ?>
                </ul>

            </div>
        </div>
    </section>

    <header>
    <section class="head_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page_name">
                        <h1><?php echo lang("site_title"); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container menu">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo BASE_URL; ?>about-us" class="dem-3"><?php echo lang("about_us"); ?></a></li>
                        <li><a href="<?php echo BASE_URL; ?>contact-us" class="dem-3"><?php echo lang("common_contact_us"); ?></a></li>
                        <!-- <li><a href="<?php //echo BASE_URL; ?>login" class="dem-3"><?php //echo lang("login_form_title"); ?></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </header>

    
<?php } ?>
<script>
$(document).ready(function () {
    $(".language").hide();
    $(".select_bx").show();
    $('.select_bx').click(function () {
        $(".language").slideToggle();
    });

    $('.sel_country').click(function () {
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
        //document.cookie = "language=" + id + ";path=" + BASE_URL + "/";
        
    });

});

    // $(function () {

    //     $('#change-lang').change(function() {
    //         $.ajax({
    //             type:"POST",
    //             url : BASE_URL + "auth/switchLanguage",
    //             data : [{name: csrf_name, value: csrf_token}, {name: 'language', value: $(this).val()}],
    //             success : function(response) {
    //                 window.location.href = window.location.href;
    //             },
                        
    //         });       
    //     });
    // });

</script>
<style>
.custom_language_dropdownl {
    display: inline-block;
    margin:0;float: right;
    position: relative;
    vertical-align: middle;
}


.custom_language_dropdownl select { cursor: pointer; -moz-appearance: none; -webkit-appearance: none; outline: none; border: none; background: none; color: #817973; font-weight: 300; font-size: 16px; padding: 0 18px 0 0; position: relative; width: 100%; }
.custom_language_dropdownl:after { background: url(./public/front/assets/images/down_aero.png) no-repeat; content: ""; display: block; height: 19px; position: absolute; right: 0px; top: 9px; width: 21px; z-index: 999; pointer-events: none; }
    /*==Close here color and logog setting css==*/
.top-right-menu ul.language li {
    border: medium none;
    display: block;
    padding: 0;
}
.select_bx {
    border-radius: 0;
    color: #605851;
    cursor: pointer;
    font-size: 14px;
    margin-top: 1px;
    padding: 1px 6px 2px;
    text-align: left;
    width: 150px;
}

ul.language {
    background: rgb(29,37,50) none repeat scroll 0 0;
    border-radius: 0;
    line-height: 22px;
    margin: 0;
    padding: 5px 10px;
    position: absolute;z-index: 9;
    text-align: left;
    top: 27px;
    width: 100%;
}

ul.language {
    line-height: 22px;
    text-align: left;
}
#select_bx img, .language img {
    max-width: 18px;
    vertical-align: middle;
}
</style>
