/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.            
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();

/***
Usage
***/
//Custom.init();
//Custom.doSomeStuff();



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
        
        var password = $("form").serialize();
        var profile = {

                service:function() {
                            $.ajax({
                                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                url         : BASE_URL+'change_password', // the url where we want to POST
                                data        : password, // our data object
                                dataType    : 'json', // what type of data do we expect back from the server
                                encode      : true
                            }).done(function(data) {

                                if(data.error) {
                                    
                                }else {
                                    
                                }

                                // here we will handle errors and validation messages
                            });

                                // stop the form from submitting the normal way and refreshing the page
                },
               
                save:function() {

                      $("form").submit( function (event) {
                           
                            profile.service();
                            event.preventDefault();
                        
                        });
                },
                init:function() {
                       
                        profile.save();
                   
                }

        };

        profile.init();



