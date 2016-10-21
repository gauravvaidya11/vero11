function usernamesize(){
    var username= $("#username").val();
    if(username.length < 6 ){       
        $("#username").css("border", "1px solid red"); 
        return false;       
    }else{
         $("#username").css("border", "1px solid green"); 
        return true;
    }
    
}
function updusernamesize(){
    var username= $("#upd_username").val();
    if(username.length < 6 ){        
        $("#upd_username").css("border", "1px solid red"); 
        return false;       
    }else{
        $("#upd_username").css("border", "1px solid green"); 
        return true;
    }
}



function isNumberKey(evt)
{

    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function validateEmail(email) {
    
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
    if (!emailReg.test(email)) {
        return false;
    } else {
        return true;
    }
}

function isValidURL(url) {
    //var RegExp1 = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    var RegExp = /((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)/i;
    if (RegExp.test(url)) {
        return true;
    } else {
        return false;
    }
}

function check_length()
{
    var mobile_length = $("#mobile").val().length;
    if (mobile_length != 11)
    {
        alert("Please enter only 11 digit mobile number.");
        return false;
    }
    return true;
}

function validateInputs()
{
    var ack = 0;
    $(".required").each(function() {
        if ($(this).val() == "")
        {
            ack = 0;
            $(this).css("border", "1px solid red");
            return false;
        }
        else {
            if ($(this).attr("id") == "email")
            {
                if (!validateEmail($(this).val()))
                {
                    ack = 0;
                    $(this).css("border", "1px solid red");
                    return false;
                }
            }

            if ($(this).attr("id") == "mobile")
            {
                if ($(this).val().length != 11)
                {
                    ack = 0;
                    $(this).css("border", "1px solid red");
                    return false;
                }
            }
            $(this).css("border", "1px solid green");
            ack = 1;
        }
    });
    return ack;
}

function validateUsername(){

  $.validator.addMethod("check_username", function(value, element) {
        if (value.length > 50) {
            return false;
        } else if (value.search(/[a-zA-Z]/) == -1) {
            return false;
        } else if (value.search(/[^a-zA-Z0-9\_\.\-]/) != -1) {
            return false;
        }
        return true;
    }, 'Please provide valid username.');
    
}

/* Check username validation
*  create - 773
 */
function validateUsername(){

  $.validator.addMethod("check_username", function(value, element) {
        if (value.length > 50) {
            return false;
        } else if (value.search(/[a-zA-Z]/) == -1) {
            return false;
        } else if (value.search(/[^a-zA-Z0-9\_\.\-]/) != -1) {
            return false;
        }
        return true;
    }, 'Please provide valid username.');
    
}
/* Check Latitude validation
*  create - 773
 */
function validateLatitude(){

   $.validator.addMethod("check_lat", function(value, element) {
        if (value <= 90 && value >= -90) {
            return true;
        }
        return false;
    }, 'Invalid latitude.');
    
}
/* Check Longitude validation
*  create - 773
 */
function validateLongitude(){

    $.validator.addMethod("check_long", function(value, element) {
        if (value <= 180 && value >= -180) {
            return true;
        }
        return false;
    }, 'Invalid longitude.');
    
}
