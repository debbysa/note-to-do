// Function that validates email address through a regular expression.


$(document).ready(function() {
	$("#LoginBtn").click(function() {
		var username = $("#username").val();
		var password = $("#password").val();
		if (username == '' && password == '') {
			$(".login form").addClass('animated bounce');
			$(".login form").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      		$(this).removeClass('animated bounce');
			});
		} else if (username == '') {
			$("#username").addClass('animated shake');
			$("#username").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('animated shake');
			});
		} else if (password == '') {
			$("#password").addClass('animated shake');
			$("#password").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		    $(this).removeClass('animated shake');
			});
		} else  {
			 // write below POST method to send data to php/servlet file. 

			$.post("proses_login.php", {
				username: username,
				password: password
			}, function(data) {

				if (data == 'success') {
					$("form")[0].reset();
				}

				alert(data);
			});
			
 
			// $(".login").addClass('animated fadeOut');
			// $(".login").hide();
			// $(".welcomeMsg").html('Welcome !!').addClass('animated fadeIn');
		}
	});
});