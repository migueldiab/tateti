/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function validarFormRegistro(){
    
    if ($('#contrasena').val()!=$('#confirmar').val()) {
      $('#errorMsg').text('Contraseña no es igual a la confiramción');
      return false;
    }
    if ($('#usuario').val().length<4) {
      $('#errorMsg').text('El nombre de usuario debe tener al menos 4 caracteres');
      return false;
    }
    $('#formRegistro').submit();
    
    
}