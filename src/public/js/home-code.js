var dataForm = [];

window.onload = function () {

	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
};


$(document).ready(function () {

	

    $("#Registrar").click(function() {
		dataForm.push(($('#nome-r').val()) , ($('#email-r').val()) , ($('#senha-r').val()) , ($('#senhav-r').val()) );
		
		for(var i=0;i<dataForm.length;i++){
			if(dataForm[i] === ""){   
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					html: 'Por Favor Preenche todos os campos corretamente'					
				});
				dataForm=[];
			}
		}

		if(dataForm[2] === dataForm[3]){
			dataForm= {nome : ($('#nome-r').val()) , email : ($('#email-r').val()) , senha : ($('#senha-r').val()) , senhav : ($('#senhav-r').val()) };
			$.ajax({
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "/registerUser",
				data: {
					data : dataForm
				},
				success: function(res) {
					window.location=res.url;
				},
				error: function() { 
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						html: 'Ocorreu um Erro, O Email já pode ter sido cadastrado'					
					});
					 
				}   
			});
			dataForm = [];
		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				html: 'Senhas Não Coincidem, Por Favor Digita Novamente'					
			});

			dataForm=[];
		}

	});



	$("#Login").click(function() {
		if( ($('#email-l').val()) != "" && ($('#senha-l').val()) != ""){
			dataForm= {email : ($('#email-l').val()) , senha : ($('#senha-l').val()) };
			$.ajax({
				type: "GET",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "/loginUser",
				data: {
					data : dataForm
				},
				success: function(res) {
					window.location=res.url;
				},
				error: function(data) { 
					Swal.fire({
						icon: 'error',
						title: 'Oops... Ocorreu um Erro,',
						html: 'Login inválido, Por favor entre com as credenciais corretas ou tente mais tarde'											
					});
					
				}   

			});
			dataForm = {};
		}else{
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				html: 'Por Favor Preenche todos os campos corretamente'					
			});
		}





		
	});
});
			
					 
	
	


