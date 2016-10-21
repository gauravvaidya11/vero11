var image_crop = {
    DPData: null,
    DPFile: null,
    DPCropData: null,
    DPCropFile: null,
    init: function() {
        var _that = this;
        $("#change_avtar").click(function() {
            $("#avtar_image").click();
        });
        $("#avtar_image").change(function(file) {
            _that.startCrop();
        });
        $("#avtar_rotate_right").click(function() {
            _that.rotateRight();
        });
        $("#avtar_rotate_left").click(function() {
            _that.rotateLeft();
        });
        $("#avatar_crop").click(function() {
            _that.crop();
        });
        $(document).keyup(function(e) {
            if (e.keyCode == 27) {
                _that.reset();
            }
        });
        $('#coverWindow').on('hidden.bs.modal', function() {
            _that.reset();
        })
    },
    startCrop: function() {
        $("#cropImg").attr("src",BASE_URL+"public/user_dashboard/assets/images/loader.gif");
        $('#crop_image_div > #cropImg').cropper('destroy');
        var _that = this;
        var file = $('#avtar_image')[0].files[0];
        if (file)
        {
            var type = file.type;
            var size = file.size;

            if (!(type == "image/jpg" || type == "image/jpeg" || type == "image/gif" || type == "image/png")) {
                bootbox.alert("Only jpeg,png and gif file type allowed ");
                return;
            }
            if (size > 10485760) {
                bootbox.alert("This image file is too big. Max size is 10 MB");
                return;
            }

            $('#coverWindow').modal('show');
            setTimeout(function() {
                
              // return false;
                $('#crop_image_div > #cropImg').cropper('destroy');
                _that.resizeImg(file, "", 1000, 1000, 100, function(file, data) {

                    _that.DPData = data;
                    _that.DPFile = file;
                   $('#crop_image_div > #cropImg').cropper('destroy');

                    $("#cropImg").one("load", function() {
                        $("#crop_image_div").css('background-image','none');        
                        $("#popUp").css("display", 'block');
                        $('#crop_image_div > #cropImg').cropper({
                            aspectRatio: 1 / 1,
                            data: data,
                            preview: '#cropPreviewImg',
                            background: false,
                            guides: false,
                            crop: function(e) {

                            }
                        });
                        $('.crop_button').prop('disabled', false);
                        $('.crop_button').removeClass("disabled");
                    }).attr("src", data);

                });
            }, 1000);


        }
    },
    resizeImg: function(file, imageId, w, h, quality, returnResult)
    {
        this.getImgInfo(file, function(result) {
            var width = result.width;
            var height = result.height;
            var name = result.name;
            var size = result.size;



            if (width > height)
            {
                if (width < w)
                    w = width;
                h = 0;
            } else
            {
                if (height < h)
                    h = height;
                w = 0;
            }
            //image/jpeg image/gif image/png
            canvasResize(file, {
                width: w,
                height: h,
                crop: false,
                quality: quality,
                //rotate: 90,
                callback: function(data, width, height) {
                    var f = canvasResize('dataURLtoBlob', data);
                    returnResult(f, data);
                }
            });
        });



    },
    getImgInfo: function(file, callback)
    {
        var reader = new FileReader();
        var image = new Image();
        reader.onload = function(fileData) {

            image.onload = function() {
                callback({width: this.width, height: this.height, type: file.type, name: file.name, size: file.size});
            };
            image.src = fileData.target.result;
        };
        reader.readAsDataURL(file);
    },
    rotateRight: function() {
        $('#crop_image_div > #cropImg').cropper('rotate', 90);
    },
    rotateLeft: function() {
        $('#crop_image_div > #cropImg').cropper('rotate', -90);
    },
    crop: function() {
        var _that = this;
        $('.crop_button').prop('disabled', true);
        _that.DPCropData = $('#crop_image_div > #cropImg').cropper('getCroppedCanvas', {width: 250, height: 250}).toDataURL();
        _that.DPCropFile = canvasResize('dataURLtoBlob', _that.DPCropData);



        var fd = new FormData();
        fd.append('avtar_image', _that.DPCropFile, 'avtar_image.png');
        fd.append(csrf_name, csrf_token);


        $.ajax({
            url: BASE_URL + UPLOAD_AVATAR_PATH,
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(result) {
                commonJS.isLogin(result);
                var data = $.parseJSON(result);
                if (data.result == "success") {
                    $("#user_avatar").attr("src", _that.DPCropData);
                    $(".user_avatar_change").attr("src",_that.DPCropData);
                } else {
                    bootbox.alert("Some error while uploading you avatar. Refresh and try again.",function(){
                        _that.reset();
                    });
                   return; 
                 }
                _that.reset();
            }
        });
    },
    reset: function() {
        $("#cropImg").attr("src", BASE_URL+"public/user_dashboard/assets/images/loader.gif");
        $('#coverWindow').modal('hide');
        $('#crop_image_div > #cropImg').cropper('destroy');
        $('.crop_button').prop('disabled', true);
        $('.crop_button').addClass("disabled");
        $("#crop_image_div").css('background-image',"url(http://localhost/monofood/public/user_dashboard/assets/images/loader_asd.gif)");
        
    }
}

$(function() {
    image_crop.init();
})