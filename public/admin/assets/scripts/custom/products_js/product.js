// Add Product validation section here
var product = {
    init: function () {
        this.validation();
        this.showHideProductTax();
        this.addCountryTax();
    },
    validation: function () {
        var _that = this;
        // change profile  validation and ajaxs
        $("#product_submit").click(function () {
            _that.addProductValidation();
        });

        $('#frm_product input').keypress(function (e) {
            if (e.which == 13) {
                _that.addProductValidation();
            }
        });

        $.validator.addMethod('decimal', function (value, element) {
            return this.optional(element) || /^[0-9]+(\.\d{0,2})?$/.test(value);
        }, "Please enter a correct number, format xxxx.xx");

    },
    // start add product validation and ajax
    addProductValidation: function () {
        $('#frm_product').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: true, // do not focus the last invalid input
            rules: {
                name: {
                    required: true
                },
                description: {
                    required: true,
                    minlength: 100
                },
                excerpt: {
                    required: true,
                    minlength: 100
                },
                quantity: {
                    required: false,
                    maxlength: 64,
                    digits: true
                },
                unit: {
                    required: false,
                    maxlength: 64,
                    digits: true
                },
                price: {
                    required: true,
                    number: true,
                    decimal: true
                },
                saleprice: {
                    required: true,
                    number: true
                },
                weight: {
                    required: true,
                    number: true,
                }
            },
            messages: {
                name: {
                    required: "Product Name is required."
                },
                description: {
                    required: "Description is required.",
                    minlength: "Description not less than 100 character."
                },
                excerpt: {
                    required: "Excerpt is required.",
                    minlength: "Excerpt not less than 100 character."
                },
                quantity: {
                    digits: "Product quantity should be only in digits",
                    maxlength: "Product quantity not more than 64 character."
                },
                unit: {
                    digits: "Product unit should be only in digits",
                    maxlength: "Product unit not more than 64 character."
                },
                price: {
                    required: "Product price is required.",
                    number: "Price should be numberical format."
                },
                saleprice: {
                    required: "Product saleprice is required.",
                    number: "Sale Price should be numberical format."
                },
                weight: {
                    required: "Product weight is required.",
                    number: "Product weight should be numberical format.",
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit   
                $('.alert-danger', $('#frm_product')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            }
        });
        $('.opt').each(function() {
            $(this).rules('add', {
                required: true,
                number: true,
                min: 1,
                maxlength: 10,
                messages: {
                    required:  "Level price is required",
                    number:  "Level Price should be numberical format.",
                    min: "Level Price must be greater than 0",
                    maxlength: "Level Price length must not be greater than 10"
                }
            });
        });
        $('.tax').each(function() {
            $(this).rules('add', {
                required: true,
                number: true,
                min: 0,
                maxlength: 10,
                messages: {
                    required:  "Tax Precentage is required",
                    number:  "Tax Precentage should be numberical format.",
                    min: "Tax Precentage must be equal to or greater than 0",
                    maxlength: "Tax Precentage length must not be greater than 10"
                }
            });
            
        });$('.tax_opt').each(function() {
            $(this).rules('add', {
                required: true,
                messages: {
                    required:  "Tax Option is required",
                }
            });
        });
        var result = $("#frm_product").valid();
        var opt_result=$('.opt').valid();
        var tax_result=$('.tax').valid();
        if (result == true && opt_result == true && tax_result == true) {
            $("#frm_product").submit();
            return true;
        } else {
            return false;
        }
    },
    //show hide product tax fields add by rohit
    showHideProductTax: function () {

        var tex_value = $('select.set_tax option:selected').val();
        if (tex_value == 1) {
            $('.showhide_country').show();
        } else {
            $('.showhide_country').hide();
        }

        $('.set_tax').change(function () {
            if ($('.set_tax').val() == 1) {
                $('.showhide_country').show();
            } else {
                $('.showhide_country').hide();
            }
        });

        var country_value = $('select.countrytax option:selected').val();
        if (country_value) {
            $('.showhide_tax').show();
        } else {
            $('.showhide_tax').hide();
        }

        $('.countrytax').change(function () {

            var country_id = $('.countrytax').val();
            // if($('.countrytax').val()) {
            //     $('.showhide_tax').show(); 
            //     } else {
            //         $('.showhide_tax').hide(); 
            //     } 
        });


    },
    //show country for product tax add by rohit
    addCountryTax: function () {
        // add country for tax js here
        $('.add-country').click(function () {
            var country_id = $('select.countrytax option:selected').val();
            var name = $('select.countrytax option:selected').text();
            var worning_msg = "Sorry please select at least one country.";
            if (country_id == undefined || country_id == "") {
                bootbox.alert(worning_msg, function () { });
            } else {
                if ($("#related_country_" + country_id).length == 0) {
                    var view = null;
                    var level_values = [];
                    if (country_id != undefined && name != undefined) {
                        $.ajax({
                            type: 'post',
                            dataType: 'json',
                            url: BASE_URL + "products/admin/getLevels",
                            data: [{'name': csrf_token_name, 'value': csrf_token}],
                            async: false,
                            success: function (resp) {
                                $.each(resp, function (level_key, level_value) {
                                    var obj = {};
                                    obj['id'] = level_value.id;
                                    obj['roll_type'] = level_value.roll_type;
                                    obj['level_name'] = level_value.level_name;
                                    obj['price'] = "";
                                    level_values.push(obj);
                                });
                            }
                        });
                        
                        view = {
                            country_id:country_id,
                            name:name,
                            level_values: level_values
                        }
                    }
                    else
                    {
                        if($('#related_country_'+$('#country_list').val()).length == 0 && $('#country_list').val() != null)           
                        {
                            view = {
                                    country_id:$('#country_list').val(),
                                    name: $('#country_item_'+$('#country_list').val()).html()
                            }
                        }
                    }

                    if(view != null)
                    {
                        var relatedCountryItemsTemplate = $('#relatedCountryItemsTemplate').html();
                        var output = Mustache.render(relatedCountryItemsTemplate, view);
                        $('#country_items_container').append(output);

                        var relatedCountryLevelTemplate = $('#relatedCountryLevelTemplate').html();
                        var opt = Mustache.render(relatedCountryLevelTemplate, view);
                            var container = '#levelContainer'+view.country_id;
                        $(container).append(opt);
                    }
                }else{
                        var worning_msg = "Already added <strong>" +name+ "</strong> country please select another country."
                        bootbox.alert(worning_msg, function() { });
                }
            }


        });

    },
};

$(function () {
    //TableAjax.init();
    product.init();

    if (!RedactorPlugins)
        var RedactorPlugins = {};
    $('.redactor').redactor({
        lang: 'english',
        minHeight: 200,
        pastePlainText: true,
        linebreaks: true,
        imageUpload: BASE_URL + 'products/admin/uploadImage',
        imageUploadFields: {
            csrf_token_name: csrf_token
        },
        imageUploadErrorCallback: function (json) {
            // alert(json.error);
        },
        plugins: ['imagemanager']
    });

});







