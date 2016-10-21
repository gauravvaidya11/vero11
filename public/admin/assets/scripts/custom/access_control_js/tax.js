// Add logistics task validation and events section here
var tax = {
    init: function () {
        this.validation();
        this.events();
    },
    events: function () {

    },
    validation: function () {
        var year = (new Date).getFullYear();
        $(".date-picker").datepicker({
            autoclose: true,
            changeYear: false,
            yearRange: '-0:+0',
            defaultDate: +0,
            minDate: new Date(year, 0, 1),
            maxDate: new Date(year, 11, 31),
            showButtonPanel: true,
            format: "yyyy-mm-dd",
            minViewMode: 1,
            maxViewMode: 1
        });

        /************ for admin tax manage *************************/
        $(".date-picker1").datepicker({
            autoclose: true,
            changeYear: false,
            yearRange: '-0:+0',
            defaultDate: +0,
            minDate: new Date(year, 0, 1),
            maxDate: new Date(year, 11, 31),
            showButtonPanel: true,
            format: "yyyy-mm-dd",
            minViewMode: 1,
            maxViewMode: 1
        });

        $(".date-picker2").datepicker({
            autoclose: true,
            changeYear: false,
            yearRange: '-0:+0',
            defaultDate: +0,
            minDate: new Date(year, 0, 1),
            maxDate: new Date(year, 11, 31),
            showButtonPanel: true,
            format: "yyyy-mm-dd",
            minViewMode: 1,
            maxViewMode: 1
        }).on('changeDate', function (ev) {
            var now = ev.date;
            m = now.getMonth(); 
            y = now.getFullYear(); 
            var last_date = new Date(y,m+1,0); 
            var day1   = last_date.getDate();
            if(day1<10)
            day1='0'+day1;
            var month1 = last_date.getMonth()+1;
            if(month1 <= 9)
            month1 = '0'+month1;
            var year1  = last_date.getFullYear();
            $(this).datepicker('update', year1+'-'+month1+'-'+day1);
        });
        /****************************** End ********************************/
        
    },
};

$(function () {
    tax.init();
});







