function openUpdate(){

	var response = confirm("Are you sure you want to update username and password?");

		if(response == true){
			//do something..
			var settings = `
					<a href='' class='btn btn-sm btn-primary'> My Posts</a>
					<a href='' class='btn btn-sm btn-danger' onclick='return openUpdate()'> Update username and password</a>
					<a href='logout.php' class='btn btn-sm btn-primary'> Log out</a>`;

					settings += "<hr>";

				settings += "<a href='update_username.php' class='btn btn-sm btn-danger'>Update Username</a> <a href='update_password.php' class='btn btn-sm btn-danger'>Update Password</a>";
		
			document.getElementById('update_id').innerHTML = settings;

			return false;

		}else{
			alert("Sorry, you may continue ...");
		}

		


}


function loadSignUp(){
	$('#load_forms_id').load('includes/loader/register.loader.php');

	return false;
}



function like_post(post_id){


	$.ajax({
		url: 'post_likes_processor.php',
		method: 'POST',
		data: { post_id: post_id},
		success: function(result){
				$('#post_like_id_'+post_id).html(`<i class='glyphicon glyphicon-heart'></i> ${result} Likes`);
					
		},
		beforeSend(){
			//$('#like_loading_'+post_id).html('loading...');
		}
	})

	return false;
}