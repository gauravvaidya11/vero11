//$(function(){
        //console.log(tot);
       // var conditions  = [];
        /* var formData    = {
            match_condition : 1,
            order_by : 1
           programe_category           : 'category:66',
            programe_rec_commission     : [],
            programe_commission_type    : [],
            payment_method              : []
        };*/
        

        var directory = {

               findAndRemove : function (array, property, value) {

                              array.forEach(function(result, index) {

                                if(result[property] === value) {
                                  //Remove from array
                                  array.splice(index, 1);
                                }    
                              });

                             
                },

                columns:function() {
                    

                    formData.match_condition = $("input[name='match_condition']:checked").val();
                        
                    
                    // set category in a form data
                    if($("#categories").val()!='') {

                         formData.programe_category = $("#categories").val();
                         delete formData.page;
                    }else {
                         delete formData.programe_category;
                    }
                     if($(".programe_keywords").val()!='') { 

                         formData.programe_keywords = $(".programe_keywords").val();
                         delete formData.page;
                        
                    }else {
                         delete formData.programe_keywords;
                    }
                    // set recurring commisiion in a form data
                    if($("input.programe_rec_commission:checked").length){
                        formData.programe_rec_commission = [];
                        delete formData.page;
                        
                        $(".programe_rec_commission").each(function() {

                            if($(this).is(":checked")){
                               
                            
                                formData.programe_rec_commission.push($(this).val());
                            }
                            
                        });

                       
                    }else {
                        delete formData.programe_rec_commission;
                    }
                     // set programme commission type in a form data
                     if($("input.programe_commission_type:checked").length){
                        formData.programe_commission_type = [];
                        delete formData.page;
                        
                        $(".programe_commission_type").each(function() {

                            if($(this).is(":checked")){
                               
                            
                                formData.programe_commission_type.push($(this).val());
                            }
                            
                        });

                       
                    }else {
                         delete formData.programe_commission_type;
                    }

                    // set programme commission type in a form data
                     if($("input.payment_method:checked").length){
                        formData.programe_payment_method = [];
                        delete formData.page;
                        
                        $(".payment_method").each(function() {

                            if($(this).is(":checked")){
                               
                            
                                formData.programe_payment_method.push($(this).val());
                            }
                            
                        });

                       
                    }else {
                         delete formData.programe_payment_method;
                    }

                    
                    
                },

                service:function() {

                            $.ajax({
                                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                url         : BASE_URL+'ajax/search.php', // the url where we want to POST
                                data        : formData, // our data object
                                dataType    : 'json', // what type of data do we expect back from the server
                                encode          : true
                            }).done(function(data) {

                                // log data to the console so we can see
                                //console.log(data.result); 
                                $(".dynamicResult").empty();
                                    $(".pagition").empty();
                    
                                if(data.error) {

                                    
                                    var programmes = '';

                                    $.each(data.result , function( key , val ) {


                                       programmes+= '<li>';
                                       programmes+= '<div class="artical_image">';
                                       programmes+= '<a href="#">';

                                       if(val.program_image!='')
                                       programmes+= '<img src="'+BASE_URL+'assets/uploads/program/'+val.program_image+'" alt="" />';
                                       else
                                       programmes+= '<img src="'+BASE_URL+'assets/images/NIA.jpg" alt="" />';

                                       programmes+= '</a>';
                                       programmes+= '</div>';
                                       programmes+= '<div class="artical_depail">';
                                       programmes+= '<h3><a href="'+BASE_URL+'programe/'+val.id+'"">'+val.programe_name+'</a></h3>';
                                       programmes+= '<span class="sub_title byClass" rel="'+val.catID+'">'+val.catName+'</span>';
                                       programmes+= '<a href="#" class="site_url">'+val.programe_join_url+'</a>';
                                       programmes+= '<p>'+val.programe_details+'</p>';
                                       programmes+= '<p class="pop_hover">';
                                       programmes+= '<span>Quick Details</span>';
                                       programmes+= '<span>Base Commission:'+val.programe_base_commission+'</span>';
                                       programmes+= '<span>Two Tier:'+val.TWOTIER+'</span>';
                                       programmes+= '<span>Recurring Commissions:'+val.RECCOMMISSION+'</span>';
                                       programmes+= '<span>Commission Type:'+val.COMMISSIONTYPE+'</span>';
                                     //  programmes+= '<span>Payment Method:</span>';
                                       programmes+= '<span>Payment Frequency:'+val.programe_payment_frequency+'</span>';
                                       programmes+= '<span>Min Payment:'+val.programe_min_payment+'</span>';
                                      // programmes+= '<span>Affiliate Software:'+val.programe_affiliate_soft+'</span>';
                                       programmes+= '<span>Cookie Period:'+val.programe_cookie_period+'</span>';
                                       programmes+= '<span>Data Feed:'+val.DATAFEED+'</span>';
                                       programmes+= '<img src="'+BASE_URL_IMG+'arrow.png" alt="" class="arrow" />';
                                       programmes+= '</p>';
                                       programmes+= '</div>';
                                       programmes+= '<div class="clear"></div>';
                                       programmes+= '</li>';
                                     
                                     
                                    });

                                    $(".dynamicResult").append(programmes);
                                    $(".pagition").append(data.pagination);
                                }else {
                                    var programmes = '<div>Sorry the category you are looking for is not available.</div>';
                                    $(".dynamicResult").append(programmes);
                                }


                                // here we will handle errors and validation messages
                                });

                                // stop the form from submitting the normal way and refreshing the page
                },
                paging:function() {

                    $(document).on("click" , ".mypaging" , function( event ){
                    
                        formData.page = $(this).attr("rel");
                        directory.service();
                        $('html, body').animate({scrollTop : 0},1200);
                        event.preventDefault();
                    });

                },
                categoryLink:function() {
                    $(document).on("click" , ".byClass" ,function( event ) {
                        delete formData.page;
                        formData.programe_category = $(this).attr("rel");
                        directory.service();
                        $('html, body').animate({scrollTop : 0},1200);
                        event.preventDefault();

                    });
                },
                search:function() {

                      $("form").submit( function (event) {
                            delete formData.page;

                            directory.columns();
                            /*if(Object.keys(formData).length <= 0) {
                                formData.programe_category = 'category:66';
                            }*/
                            directory.service();
                            event.preventDefault();
                        
                        });
                },
                init:function() {
                        //directory.columns();
                        directory.service();
                        directory.search();
                        directory.paging();
                        directory.categoryLink();
                        directory.filterForm();
                        directory.changeSort();
                       
                   
                },
                filterForm:function() {
                    $(".filterForm").hide();
                    $(".clickFilter").click(function(){
                    
                            $(".filterForm").toggle();
                    });
                },
                changeSort:function() {

                    $(".sortMe").change(function( event ){

                            formData.order_by = $(this).val();
                            directory.columns();
                            directory.service();
                            event.preventDefault();
                    })
                    

                }

        };

        
        

   // });
