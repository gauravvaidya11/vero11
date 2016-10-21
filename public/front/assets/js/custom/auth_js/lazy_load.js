var ajx;
var page = 0;
var more = 0;
$(window).scrollTop(0);
var foo = $(".footer").height();
//alert(allow_scroll);
var lazyload = (function(){
	var action = {
					init:function(){
						action.LoadDealerListing();
					},

				LoadDealerListing:function(){
					var lat = $('input:hidden[name=lat]').val();
		        	var longs = $('input:hidden[name=long]').val();
		        	var register_type = 1;

		        	
		            $(document).scroll( function() {
		            	if (more === 0 && allow_scroll === true)
	                    	{
		                        if ($(document).height() < $(window).scrollTop() + $(window).height() + foo+100)
		                        {
		                            page = page + 1;
		                            allow_scroll = false;
		                            try {
		                                ajx.abort();
		                            } catch (e) {
		                                // allow_scroll = true;
		                            }
		                            ajx = $.ajax({
		                                type: "POST",
		                                url: BASE_URL + 'auth/lazyDealerRelation',
		                                data: {"page":page,"lat":lat,"longs":longs,"register_type":register_type,"csrf_name":csrf_token},
		                                //    contentType: "application/json; charset=utf-8",
		                                dataType: "json",
		                                async: false,
		                                cache: false,
		                                success: function(data)
		                                {
		                                    if (data.length == 0 || typeof data == 'undefined') {
		                                        more = 1;
		                                        var ht = '';
		                                        ht += '<div class="no_record"><center><b class="text-danger"> No More Record Found.</b></center></div>';
		                                        $(".no_data").html(ht);
		                                    } else {
		                                        $('#dealer_scroll').append(data).show('slow');
		                                    }
		                                    allow_scroll = true;
		                                },
		                                error: function(x, e)
		                                {
		                                    //       alert("The call to the server side failed. " + x.responseText);
		                                }
		                            });
		                        }
		                    } else {
		                        return false;
		                    }
		             });
		        },

       

       

};

$(function(){
		action.init();

	})
	return action;
})();
