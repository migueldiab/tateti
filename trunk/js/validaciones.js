/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function emailValido(direccion)
{
  apos=direccion.indexOf("@");
  dotpos=direccion.lastIndexOf(".");
  if (apos<1||dotpos-apos<2||direccion.length<5)
  {
    return false;
  }
  else {
    return true;
  }
}
function validarFormRegistro(){
    
    if ($('#contrasena').val()!=$('#confirmar').val()) {
      $('#errorMsg').text('Contraseña no es igual a la confiramción');
      return false;
    }
    if ($('#usuario').val().length<4) {
      $('#errorMsg').text('El nombre de usuario debe tener al menos 4 caracteres');
      return false;
    }
    if ($('#contrasena').val().length<4) {
      $('#errorMsg').text('La contraseña debe tener al menos 4 caracteres');
      return false;
    }

    if (emailValido($('#email').val())==false) {
      $('#errorMsg').text('La direccion de correo no es valida');
      return false;
    }
    $('#formRegistro').submit();
    return true;
}

