
(function() {
    var map = {
        map: null,
        defaultLat: '51.165691',
        defaultLong: '10.451526000000058',
        marker: null,
        init: function() {
            var _that = this;
            _that.initMapLocation();
            _that.conuntryChange();
            _that.stateChange();
            _that.searchGeoLocation();
        },
        initMapLocation: function() {
            var _that = this;
            // Try HTML5 geolocation.

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    _that.defaultLat = position.coords.latitude;
                    _that.defaultLong = position.coords.longitude;
                    if ($('#set_lat').length && $('#set_lon').length) {
                        _that.defaultLat = $('#set_lat').val();
                        _that.defaultLong = $('#set_lon').val();
                    }
                    _that.setCenter(_that.defaultLat, _that.defaultLong);
                });
            }
            if ($('#set_lat').length && $('#set_lon').length) {
                _that.defaultLat = $('#set_lat').val();
                _that.defaultLong = $('#set_lon').val();
            }
            _that.setCenter(_that.defaultLat, _that.defaultLong);

        },
        setCenter: function(lat, long) {
            var _that = this;
            _that.createMap(lat, long);

            if (!_that.map) {
                console.log("map selector is not correct");
                return;
            }

            google.maps.event.addListenerOnce(_that.map, 'idle', function() {
                var latlngPos = new google.maps.LatLng(lat, long);
                _that.createMarker(latlngPos);

            });



        },
        createMap: function(lat, long) {
            var _that = this;
            if (document.getElementById('googleMap')) {
                var latlngPos = new google.maps.LatLng(lat, long);
                var myMap = {
                    center: latlngPos,
                    zoom: 6,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE
                    }
                };
                this.map = new google.maps.Map(document.getElementById('googleMap'), myMap);

            } else {
                return;
            }
        },
        conuntryChange: function() {
            var _that = this;
            $('#country_id,#country').change(function() {
                console.log("check");
                var countryid = $(this).val();
                _that.createState(countryid);
            });
        },
        createState: function(countryid, callback) {
            var post_data = [{'name': "countryid", 'value': countryid}, {'name': csrf_name, 'value': csrf_token}];
            $.ajax({
                type: "post",
                dataType: "json",
                url: BASE_URL + "auth/getStateByCountryId",
                data: post_data,
                success: function(data)
                {
                    if (data['country_dialing_code']) {
                        if ($(".country_dailing_code").find('option[value=' + data['country_dialing_code'] + ']').length > 0) {
                            $(".country_dailing_code").val(data['country_dialing_code']);
                        } else {
                            $(".country_dailing_code").val("");
                        }
                    } else {
                        $(".country_dailing_code").val("");
                    }
                    $(".get-state").html(data['html']).trigger('change');
                    if (callback) {
                        callback(data);
                    }

                }
            });
        },
        stateChange: function() {
            $('.get-state').on('change input ', function() {
                var zone_id = $(this).val();
                if (zone_id != 0 && zone_id != '') {

                    var post_data = [{'name': "zone_id", 'value': zone_id}, {'name': csrf_name, 'value': csrf_token}];

                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: BASE_URL + "auth/getAreaByZoneId",
                        data: post_data,
                        success: function(data) {
                            $(".get-area").html(data['html']);
                        }
                    });

                } else {
                    $(".get-area").html('<option value="">--Select Area--</option>');
                }
            });
        },
        searchGeoLocation: function() {
            var _that = this;
            $(".searchGeoLocation").click(function() {
                $("#loading").css("display", "block");
                var searchString = "";
                if ($(".geo_stree_address")[0]) {
                    searchString += $(".geo_stree_address").first().val() + " ";
                }
                if ($(".geo_stree_number")[0]) {
                    searchString += $(".geo_stree_number").first().val() + " ";
                }
                if ($(".geo_city")[0]) {
                    searchString += $(".geo_city").first().val() + " ";
                }
                if ($(".geo_zip")[0]) {
                    searchString += $(".geo_zip").first().val() + " ";
                }

                if (!searchString.trim()) {
                    var message = lang_js.common_message_address_empty || "Noting to search, Please provide some address details.";
                    bootbox.alert(message);
                    $("#loading").css("display", "none");
                    return;
                }


                var geocoder = new google.maps.Geocoder();


                geocoder.geocode({'address': searchString}, function(results, status) {
                    if (status === 'OK') {
                        $("#loading").css("display", "none");
                        var country = _that.getCountry(results[0].address_components);
                        if (country) {
                            $('.geo_country option[data-ref=' + country + ']').prop('selected', true);
                            $('.geo_state').html("<option value=''> ---- </option>")

                        }

                        var state = _that.getState(results[0].address_components);

                        var countryid = $('.geo_country option[data-ref="' + country + '"]').val();
                        _that.createState(countryid, function(data) {
                            if (country && state) {
                                $('.geo_state option[data-ref="' + state + '"]').prop('selected', true).trigger("change");
                            }
                        });


                        _that.map.setCenter(results[0].geometry.location);
                        google.maps.event.addListenerOnce(_that.map, 'idle', function() {
                            $('.geo_latitude').val(results[0].geometry.location.lat());
                            $('.geo_longitude').val(results[0].geometry.location.lng());
                            _that.removeMarker();
                            _that.createMarker(results[0].geometry.location);
                        });

                    } else {
                        $("#loading").css("display", "none");
                        var message = lang_js.common_message_address_notfound_geolocation ? lang_js.common_message_address_notfound_geolocation.replace('{{address}}', searchString) : "Given address <b>{{address}}</b> not found in map. Try agian or put information manually".replace('{{address}}', searchString);
                        bootbox.alert(message);
                    }
                });





            });
        },
        removeMarker: function() {
            var _that = this;
            if (_that.marker)
                _that.marker.setMap(null);
        },
        createMarker: function(latlngPos) {
            var _that = this;
            _that.removeMarker();
            _that.marker = new google.maps.Marker({
                map: _that.map,
                position: latlngPos,
                draggable: true,
                animation: google.maps.Animation.DROP
            });

            google.maps.event.addListener(_that.marker, 'drag', function(event) {
                $('.geo_latitude').val(event.latLng.lat());
                $('.geo_longitude').val(event.latLng.lng());
            });
        },
        getCountry: function(addrComponents) {
            for (var i = 0; i < addrComponents.length; i++) {
                if (addrComponents[i].types[0] == "country") {
                    return addrComponents[i].short_name;
                }
                if (addrComponents[i].types.length == 2) {
                    if (addrComponents[i].types[0] == "political") {
                        return addrComponents[i].short_name;
                    }
                }
            }
            return false;
        },
        getState: function(addrComponents) {
            for (var i = 0; i < addrComponents.length; i++) {
                if (addrComponents[i].types[0] == "administrative_area_level_1") {
                    return addrComponents[i].short_name;
                }
            }
            return false;
        }


    };
    $(function() {
        map.init();
    })

}())

