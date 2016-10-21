(function() {
    /*Start of the contact_message object.*/
    var emailTagReply = {
        init: function() {

            this.emailApplyTag();
        },
        emailApplyTag: function() {
            var citynames = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: {
                    url: BASE_URL +"messages/admin/getEmailIds",
                    filter: function(list) {
                        return $.map(list, function(email) {
                            return {name: email};
                        });
                    }
                }
            });
            citynames.initialize();
            $('#cc_email_id').tagsinput({
                typeaheadjs: {
                    name: 'email',
                    displayKey: 'name',
                    valueKey: 'name',
                    source: citynames.ttAdapter()
                },
                maxTags: 5,
                confirmKeys: [13, 44, 32],
                trimValue: true
            });
            
        }
    }
$(function(){
    emailTagReply.init();
})

}());
