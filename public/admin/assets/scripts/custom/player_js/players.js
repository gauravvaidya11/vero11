$(function () {
	viewPlayer();
});


function viewPlayer() {
	$('#view_btn').click(function () {
    	var player_id = 1;
     	 $.ajax({
            url: BASE_URL + 'players/get_player_detail',
            type: 'POST',
            data: [{name: csrf_name, value: csrf_token},{name: 'player_id', value: player_id}],
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });    
	});
}

