function validarFormulario(){

    var nombre   = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var correo = document.getElementById('correo').value;
    var fnacimiento = document.getElementById('fnacimiento').value;
    var sexo = document.getElementById('sexo').selectedIndex;
    var departamento = document.getElementById('departamento').selectedIndex;
    var municipio = document.getElementById('municipio').selectedIndex;
    var edad   = document.getElementById('edad').value;



    //Validar campo obligatorio
    if(nombre.length == 0){

        if(document.form1.texto.length>25){
            alert(document.form1.texto.length);
            return false;
        }else{
            alert(document.form1.texto.length);
            return false
        }
        document.getElementById("nombre").style.borderColor = "red"; 
        document.getElementById("nombre").style.boxShadow = '0 0 15px red';
        document.getElementById("nombre").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("nombre").style.boxShadow = '0 0 15px green';
    }

    //Validar campo obligatorio
    if(apellido.length == 0){
        document.getElementById("apellido").style.boxShadow = '0 0 15px red'; 
        document.getElementById("apellido").placeholder = "Este campo es obligatorio";
        return false;
    }else{
        document.getElementById("apellido").style.boxShadow = '0 0 15px green';
    }

    //Validar correo
    if(!(/\S+@\S+\.\S+/.test(correo))){
    	document.getElementById("correo").style.boxShadow = '0 0 15px red'; 
        document.getElementById("correo").placeholder = "Debe escribir un correo valido";
        return false;
    }else{
        document.getElementById("correo").style.boxShadow = '0 0 15px green';
    }

    //Validar fecha
    if(fnacimiento == ""){
    	document.getElementById("fnacimiento").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("fnacimiento").style.boxShadow = '0 0 15px green';
    }

    if(isNaN(edad) || edad.length == 0){
        document.getElementById("edad").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("edad").style.boxShadow = '0 0 15px green';
    }

    //Validar comboBox
    if(sexo == 0){
    	document.getElementById("sexo").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("sexo").style.boxShadow = '0 0 15px green';
    }




    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}