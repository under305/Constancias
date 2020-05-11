$( document ).ready(function() {
	$("#formularioLogin").click(function(event) {
		event.preventDefault();
	});

    $(document).ready(function () {
        $("#respMenu").aceResponsiveMenu({
            resizeWidth: '768', // Set the same in Media query       
            animationSpeed: 'fast', //slow, medium, fast
            accoridonExpAll: false //Expands all the accordion menu on click
        });
    });

    $("#botonLogin").click(function(event) {
    	user = $("#username").val();
    	password = $("#password").val();
    	$.ajax({
    		type: 'POST',
    		url: 'Controllers/mainController.php?opt=login',
    		data: { username: user, password: password }
    	}).then(function(data){
			if(data=="EXITO"){
				location.reload();
			}else{
				alert("Usuario y/o contraseña incorrecta");
			}
    	}).catch(function(data){
    		console.log("Recibo con error "+data);
    	});
    });

    $("#cerrar_sesion").click(function(event) {
        event.preventDefault();
        $.ajax({
            url: 'Controllers/mainController.php?opt=logout',
        }).then(function(){
            location.reload();
        });
    });
});