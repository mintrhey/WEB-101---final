$(document).ready(function(){

	$(document).on('click','#register',function(e){
		e.preventDefault();
	
		var idNumber = document.getElementById('idNumber').value;
		var firstName = document.getElementById('firstName').value;
		var lastName = document.getElementById('lastName').value;
		var gender = document.getElementById('gender').value;
		var bday = document.getElementById('bday').value;
		var program = document.getElementById('program').value;
		var yearLevel = document.getElementById('yearLevel').value;

		if(idNumber == "" || firstName == "" || lastName == "" || bday == "" || program == "" || yearLevel == ""){
			$('#warning-message').addClass('alert alert-danger marg-top');
			$('#warning-message').html('Please Fill in the Blanks');
		}else if(!/\d{3}-\d{5}/.test(idNumber)){
			$('#warning-message').addClass('alert alert-danger marg-top');
			$('#warning-message').html('Follow the right format of the ID Number');
		}else{

			$.ajax({
				url:"src/php/user.php",
				type:"POST",
				data:{	idNumber:idNumber,
						firstName:firstName,
						lastName:lastName,
						gender:gender,
						bday:bday,
						program:program,
						yearLevel:yearLevel,
						action:'addUser',
					},
				success: function(data)
				{
					data = $.parseJSON(data);

					if(data.status == "success"){
						$('#warning-message').removeClass('alert alert-danger marg-top');
						$('#warning-message').html(data.html);
						$('#userForm')[0].reset();
					}else{
						$('#warning-message').removeClass('alert alert-danger marg-top');
						$('#warning-message').html(data.html);
					}
				}
			});
		}		
	});
});