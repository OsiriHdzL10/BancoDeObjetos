
function check_mail(mail){
	if(mail.value.match(/^\S+@\S+\.\S+$/)){
        error.innerHTML="";
        mail.style.border="1px solid green";
    }
    else{
        error.innerHTML="Tu email es incorrecto, por favor verificalo";
        mail.style.border="1px solid red";
    }
}
/*function check_pass(pass){//Metodo que valida la Contraseña
    if(pass.value.match(/\w{6}/)){
        error.innerHTML="";
        pass.style.border="1px solid green";
    }
    else{
        error.innerHTML="Contraseña* La contraseña es incorrecta. Debe contener al menos 6 caracteres";
        pass.style.border="1px solid red";
    }
}


*/

        
function cancel(){
    var r=confirm("¿Estas seguro de que deseas salir del registro?");
    if (r){
        window.location.assign("index.php");
    }
    return r;
}
function checar(){
        
    alert(nombre.value);
	if (pass1.value==pass2.value){
		var url = "registro/insert.php"; // El script a dónde se realizará la petición.
            $.ajax({
                data: {"nombre": nombre.value,"ap": ap.value, "am": am.value,"mail": mail.value, 
                "tel": tel.value,"pass1":pass1.value,"direccion":direccion.value},
                type: "POST",
                dataType: "json",
                url: url, // Adjuntar los campos del formulario enviado.
                 }).done(function( data, textStatus, jqXHR ) {
             	if ( console && console.log ) {
                if (data.respuesta=="Insertado"){
                    alert("¡Ahora estas registrado en Tecside!");
                    window.location.assign("index.php");
                }
                else if (data.respuesta=="No insertado"){
                    alert("No te puedes registar en tecside debido a que tu correo ya existe en nuestra Base de datos");
                    //history.back()
                }
                //alert(id_usr.value);
                console.log( "La solicitud se ha completado correctamente." +data.lle);
             }
             }).fail(function( jqXHR, textStatus, errorThrown ) {
                 if ( console && console.log ) {
                     console.log( "La solicitud ha fallado: " +  textStatus);
                 }
            });
	}
	else{
		alert("Tus contraseñas no coinciden");
		return false;
	}
}

var cont=1;
$( document ).ready(function() {
	var email = $( "#email" );
	var pass = $( "#pass" );
	var enviar = $( "#enviar" );
	email.keyup(valida_todoinicio);
	pass.keyup(valida_todoinicio);
	enviar.click(sesion);
    var nombre = $( "#nombre" );
	var mail = $( "#mail" );
	var pass1 = $( "#pass1" );
	var pass2 = $( "#pass2" );
	var boton1 = $( "#boton1" );
	var boton2 = $( "#boton2" );
	var error= $( "#error" );
    var paterno= $( "#ap" );
    var materno= $( "#am" );
    var direccion= $( "#direccion" );
    var tel= $( "#tel" );
	nombre.keyup(valida_todo);
	mail.keyup(valida_todo);
	pass1.keyup(valida_todo);
	pass2.keyup(valida_todo);
   

});
;




function mandar(consulta, event){
    event.preventDefault();
    if ($('#haysesion').val()=="no"){
        alert("Primero inicia sesión para ver nuestro catalogo de productos");
    }
    else{
        $("#consulta").val(consulta);
        $("#datos").submit();
    }
}



/*function valida_todoinicio(){
	if (pass.value.match(/\w{6}/) && email.value.match(/^\S+@\S+\.\S+$/)){
		enviar.disabled=false;
	}
	else{
		enviar.disabled = 'disabled';
	}
}
*/



function sesion(){
	var url = "sesion/iniciar_sesion.php"; // El script a dónde se realizará la petición.
     
   
    $.ajax({
        data: {"email": email.value, "pass": pass.value},
        type: "POST",
        dataType: "json",
        url: url, // Adjuntar losdata campos del formulario enviado.
         }).done(function(resultadox ) {

            location.reload();
    });
        
        /*
     	if ( console && console.log ) {
        if (jsondata.respuesta=="Encontrado"){
        	location.reload();
        }
        else{
            alert("No se encontraron tus datos\n"+jsondata.query);
            //history.back()
        }
        console.log( "La solicitud se ha completado correctamente." );
     }
     }).fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
             console.log( "La solicitud ha fallado: " +  textStatus);
         }
    });*/
}

