// Add user list action here
var user = {
    init: function () {
        this.delete();
    },
    delete: function () {
        var _that = this;
        
        $( "body" ).delegate( ".deleteUser", "click", function() {
            var id = $(this).val();
            var user_data = [{'name':csrf_token_name,'value':csrf_token},{'name':'id','value':id}];
            
            bootbox.confirm("Are you sure, you want to delete this admin user", function(choice) {
                if (choice === true) {
                    $.post(BASE_URL+'access_control/admin/deleteAdminUser',user_data,function(resp){
                        if(resp){
                            bootbox.alert("Admin User Deleted Successfully");
                            location.reload();
                        }else{
                            bootbox.alert("Some Error Occured while deleteing admin user");
                        }
                    },"json");
                }
            });
        });
    }
};

$(function () {
    user.init();
});







