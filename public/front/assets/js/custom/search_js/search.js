// This script is use for perform search action
//var searcCount = "0";
var search = {
    count : searcCount,
    max_record : 4,
    listen:false,
    init: function () {
        this.handleSearchAction();
        this.removeSearch();
    },

    removeSearch: function () { 
        var _that = this;
        $(document).on("click","#removeSearch", function(){ 
            bootbox.confirm(lang_js.common_remove_search_confirmation_message_are_you_sure, function (result) {
                if (result) {

                    var cookies = document.cookie.split(";");
                    var delete_cookies = document.cookie = "searchPlayerData='';expires=Thu, 01 Jan 1970 00:00:00 GMT";
                    
                     $("#playerNAme").val("");
                     $("#search_age option:selected").prop("selected", false);
                     $("#search_age").selectpicker('refresh');
                     $("#country option:selected").prop("selected", false);
                     $("#country").selectpicker('refresh');

                     $("#player_postion1 option:selected").prop("selected", false);
                     $("#player_postion1").selectpicker('refresh');

                     $("#player_postion2 option:selected").prop("selected", false);
                     $("#player_postion2").selectpicker('refresh');
                     
                     $("#player_postion3 option:selected").prop("selected", false);
                     $("#player_postion3").selectpicker('refresh');
                     
                     $("#search_weight option:selected").prop("selected", false);
                     $("#search_weight").selectpicker('refresh');
                     
                     $("#search_height_m option:selected").prop("selected", false);
                     $("#search_height_m").selectpicker('refresh');

                     $("#search_height_cm option:selected").prop("selected", false);
                     $("#search_height_cm").selectpicker('refresh');
                     _that.resetPageList();
                     _that.searchPlayer();
                }
            });
        });
    },
    
    handleSearchAction: function () {
        var _that = this;
        _that.initPagination(_that.count);
        $(document).on("change", "select.searchPlayers", function () {
            $("#page_no_value").val("0");

            var json_data = JSON.stringify($("#searchPlayerForm").serializeArray());
            
            $.cookie("searchPlayerData", json_data);

            _that.searchPlayer();
        });
 
        $(document).on("keyup", ".searchPlayers", function () {
            $("#page_no_value").val("0");

            var json_data = JSON.stringify($("#searchPlayerForm").serializeArray());
            
            $.cookie("searchPlayerData", json_data);

            _that.searchPlayer();
        });


        $(document).on("click", ".likeDislike", function () {
            var player_id = $(this).attr("data-rel"); 
            if ($("#like_status_" + player_id).hasClass("fa fa-heart-o")) {
                $("#like_status_" + player_id).removeClass("fa fa-heart-o");
                $("#like_status_" + player_id).addClass("fa fa-heart");
                $("#like_status_" + player_id).attr('title', lang_js.title_and_heading_unfavorite);
                like_dis_status = 1;
            } else if ($("#like_status_" + player_id).hasClass("fa fa-heart")) {
                $("#like_status_" + player_id).removeClass("fa fa-heart");
                $("#like_status_" + player_id).addClass("fa fa-heart-o");

                $("#like_status_" + player_id).attr('title', lang_js.title_and_heading_favorite);
                like_dis_status = 0;
            }

            if($("#like_status_" + player_id).hasClass("fa fa-heart-o")){
                $("#show_hide_"+ player_id).animate({
                    opacity: 0,
                }, 2000, function() {
                    $("#show_hide_"+ player_id).remove();
                });
            }

            _that.likeDislikePlayers(player_id, like_dis_status);
        });

    },


    // This function is use for search players
    searchPlayer: function () {
        var _that = this;
        $("#searchPlayerForm").ajaxForm({
            success: function(xhr){
            var result = JSON.parse(xhr);
             $("#searchPlayerResult").html(result.html);
             var count = result.count;
             
             _that.initPagination(count);
            }

        }).submit();

    },

    initPagination:function(count){
        $("#page_list").html("");
        var _that = this;
        var max_count = _that.max_record;
        var page_count = parseInt(count / max_count);
        var extra = parseInt(count % max_count);
        
        if(extra && page_count){
            page_count++;
        }
        if(!page_count){
            $("#page_list").html("");
        }
        var page_html =  _that.getPages(page_count);
        if( page_html !== false && count > _that.max_record){
            $("#page_list").html(page_html);
            _that.listenPageChange();
        } 

    },

    listenPageChange : function (){
         
         var _that = this;
         if(_that.listen){
            return;
         }
         _that.listen = true;

         $('body').on('click','.page_no',function(){
                $('.page_no').removeClass('active');
                $(this).addClass('active');
                var page = $(this).attr("data-index");
                _that.getPageData(page);
          });

         $('body').on('click','#pg_next',function(){

                

                if($(this).prev().hasClass('active')){
                    return;
                }

                var active_index  = parseInt($('.page_no.active').attr("data-index"));
                
                var move = false;

                if($(this).prevAll().not(".hide").first().hasClass('active')){
                  move = true;
                }
                $('.page_no').removeClass('active');
                var next_index = (active_index+1);
                $('#page_no_'+next_index).addClass('active');
                if(move){
                    $("#pg_prev").next().addClass('hide');
                    $('#page_no_'+next_index).removeClass('hide');
                }
              _that.getPageData(next_index);
          });

         $('body').on('click','#pg_prev',function(){

                if($(this).next().hasClass('active')){
                    return;
                }

                var active_index  = parseInt($('.page_no.active').attr("data-index"));
                
                var move = false;

                if($(this).nextAll().not(".hide").first().hasClass('active')){
                  move = true;
                }

                var next_index = (active_index-1);
                if(move){
                    $("#pg_next").prev().addClass('hide');
                    $('#page_no_'+next_index).removeClass('hide');
                }
                $('#page_no_'+active_index).removeClass('active');
                
                    $('#page_no_'+next_index).addClass('active');    
               
                
                
              _that.getPageData(next_index);
          });
    },

    resetPageList:function(){
          $('.page_no').removeClass('active');
          $('#page_no_value').val("0");
           $("#page_list").html("");
    },
   getPageData:function(page){
        $("#page_no_value").val(page);
        var _that = this;
        $("#searchPlayerForm").ajaxForm({
            success: function(xhr){
            var result = JSON.parse(xhr);
             $("#searchPlayerResult").html(result.html);
            }

        }).submit();
      
    },

    getPages:function(page_count){
        if(!page_count){
            return false;
        }

        var template = ' <ul class="pagination" id="pagination_count">';
        template += '<li id="pg_prev">';
        template += '<a href="javascript:void(0)" aria-label="Previous">';
        template += '<span aria-hidden="true">&laquo;</span>';
        template += '</a>';
        template += '</li>';


        for(var i = 1;i <= page_count ;i++){
            var hide_class ="";
            if(i > 5){
                 hide_class = "hide";
             }
            if(i==1){
                template += '<li class="active page_no '+hide_class+'" data-index="'+i+'" id="page_no_'+i+'"><a href="javascript:void(0)">'+i+'</a></li>';
            }else{
                template += '<li class="page_no '+hide_class+'" data-index="'+i+'" id="page_no_'+i+'"><a href="javascript:void(0)">'+i+'</a></li>';
            }
            
        }
      
                     
        template += '<li id="pg_next">';
        template += '<a href="javascript:void(0)" aria-label="Next">';
        template += '<span aria-hidden="true">&raquo;</span>';
        template += '</a>';
        template += '</li>';
        template += '</ul>';
        return template;
        
},

    likeDislikePlayers: function(player_id, like_dis_status){

        var like_dislike_data = [{'name': "player_id", 'value': player_id}, {'name': "like_dis_status", 'value': like_dis_status}, {'name': csrf_name, 'value': csrf_token}];
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: BASE_URL+ 'search/likeDislikePlayer',
            data: like_dislike_data,
            success: function (xhr) {
                if (xhr.type == "error") {
                    $('.comm-message').html('<div class="alert alert-danger hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-alert" style="float:left"></span> Error! </strong>' + xhr.msg + '</div>');
                } else {
                    $('.comm-message').html('<div class="alert alert-success hideauto"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong><span class="ui-icon ui-icon-check" style="float:left"></span> Success! </strong>' + xhr.msg + '</div>');
                }
                
            }
        });
    }
    
};



$(function () {
    search.init();
});
