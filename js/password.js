const contraseña = document.getElementById('contraseña');
const imagen = document.getElementById('ojo');

imagen.addEventListener('click', () =>{
    if(contraseña.type == "password"){
        contraseña.type = "text";
        imagen.src = "../7-redSocial/images/ojo_abierto.png";
    }else{
        contraseña.type = "password";
        imagen.src = "../7-redSocial/images/ojo_cerrado.png";
    }
});