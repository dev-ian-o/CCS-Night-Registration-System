
$(document).ready(function(){

	$("#form-student").on('submit', function(e){
		e.preventDefault();
		form = "#form-student";
		console.log($(form).serialize());
		// init("form-student");	
		return false;
	});

	$("#form-register").on('submit', function(e){
		e.preventDefault();

		form = "#form-register";
		console.log($(form).serialize());
		console.log("asdas");
		init("form-register");	
		return false;
	});


	$("#id-student").on("input",function(e){
		$(".loader").fadeIn('fast');
		$("#id-student").focus();
		
		form = $('#id-student').attr("name") +"="+ $('#id-student').val();
		// console.log(form);
		// console.log(form.serialize());
		$.ajax({
			url: 'includes/request.php',
			type: 'POST',
			data: form,
			dataType: 'json',
			success: function(results){
				var vars = results[0];
				len = $('#id-student').val().length;
				$("#id-student").focus();
				
				// console.log(vars);

				// $("#lastname").val(vars.lastname);
				// $("#firstname").val(vars.firstname);
				
				// alert("successfully registered");
				
				
				if(len == 11 && vars == null){
					$("#form-student")[0].reset();
					$("#id-student").focus();
					alert("invalid id");
				}else{

					$(".name").html(vars.lastname+", "+vars.firstname);
					$(".student_id").html(vars.student_id);
					$(".ticket_status").html(vars.ticket_status);
					$("#student_no").val(vars.student_id);
				    $('#myModal').modal('show');
					$("#id-student").focus();

				}

			},
			complete:function(){

				$(".loader").fadeOut('slow');
				$("#id-student").focus();

				//loader stop 	here.
			}
		});
	});

});


function init(form){
		console.log("fetching");
		$(".loader").fadeIn('fast');
		form = $('#'+form);
		console.log(form.serialize());
		$.ajax({
			url: 'includes/request.php',
			type: 'POST',
			data: form.serialize(),
			dataType: 'json',
			success: function(results){
				var vars = results[0];
				$("#form-student")[0].reset();

				console.log(results);
				alert("Successfully registered!");

			    $('#myModal').modal('hide');

				$("#id-student").focus();

			},
			complete:function(){

				$(".loader").fadeOut('slow');
				//loader stop here.
			}
		});
}



