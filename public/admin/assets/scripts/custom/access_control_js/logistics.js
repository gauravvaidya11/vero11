// Add logistics task validation and events section here
var logistics = {
    init: function () {
        this.validation();
        this.events();
    },
    events : function () {

    },
    validation: function () {
        $("#download-pdf").click(function () {
            if($("#order_date_from").val() == "" || $("#order_date_to").val() == "" ){
                bootbox.alert("Please select correct date");
                return false;
            }
            $('#duplicate-pdf').submit();
        });
    },
};

$(function () {
    logistics.init();
});







