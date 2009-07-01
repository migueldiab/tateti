$(document).ready(eventos);
var over=false //cambiar por check en db si hay un ganador
var vacio="&nbsp;&nbsp;&nbsp;"
var started=null
var id_actual;
var intervalo;
var delayCall=10000;
var cantJugadores;
var miTipo;
var tipoOponente;
var miturno = false;

function eventos(){
 //   $("#nuevoJuego").click(borrar)
    checkStatusJuego();
//    td=$('td');
//    td.click(validar);
}

function esMiTurno(datos) {
  $("#titulo").text("Es Mi Turno : "+datos.esMiTurno);
  if (datos.esMiTurno==true) {
    miturno=true;
  }
  else {
    miturno=false;
  }
  if (datos.soyCruz==true) {
    miTipo='X';
  }
  else {
    miTipo='O';
  }

}
function validar(unObjeto)
{
  //alert ("validando");

  //validar si ya tiene algo en el campo
  // var XO=$('input[name=XO]:checked').val()
  if(over==true)
  {
    alert("juego ya terminado");
  }
  else if(miturno==false)
  {
    alert("no es mi turno o juego no iniciado");
  }
  else if(started!=true)
  {
    alert("juego no iniciado aun, o aguardando oponente");
  }
  else
  {
    if(unObjeto.text()=="")
    {
      
      enviarDatos(unObjeto);
    }
    else
    {
      alert("el campo ya esta marcado");
    }
  }
}

function checkPreviousClick(){ //indica quien hizo el ultimo movimiento
                              //bloquear el radiobutton luego de empezado el juego
    if(started==null){
        started=$('input[name=XO]:checked').val()
    }else{
        O=0
        X=0
        for(i=1;i<10;i++){
            currentCell=document.getElementById(i)
           if(currentCell.firstChild.data=="O"){
           O++
           }else if(currentCell.firstChild.data=="X"){
           X++
           }
        }
        if(started=="O"&&$('input[name=XO]:checked').val()=="X")
        {
          if(O==X+1){
              return true;
          }else{
              return false;
          }
        }
        else if(started=="O"&&$('input[name=XO]:checked').val()=="O")
        {
            if(X==O)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else if(started=="X"&&$('input[name=XO]:checked').val()=="O")
        {
            if(X==O+1){
                return true;
            }else{
                return false;
            }
        }else if(started=="X"&&$('input[name=XO]:checked').val()=="X"){
            if(X==O){
                return true;
            }else{
                return false;
            }
        }
    }
    return true;
}
function borrar(){
    over=false;
    var rows=document.getElementById('board').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    for(f=0;f<rows.length;f++){
       for(h=0;h<rows[f].getElementsByTagName('td').length;h++){
            var cell = rows[f].getElementsByTagName('td')[h];
            cell.innerHTML=vacio;
        }
    }
   }
function checkResult(){
  //checkeo horizontales
  var rows=document.getElementById('board').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  for(n=0;n<rows.length;n++){       //checkeo horizontal
    var tr = document.getElementsByTagName("tr")[n];
    var valor1=tr.firstChild.nextSibling.innerHTML
    var valor2=tr.firstChild.nextSibling.nextSibling.nextSibling.innerHTML
    var valor3=tr.lastChild.previousSibling.innerHTML
    checkGanador(valor1,valor2,valor3)
  }

 //checkeo diagonal sup izq der abajo
 var j=0
 alert(trV[j].firstChild.nextSibling.innerHTML);
 var trV = document.getElementsByTagName("tr");
 var valorV1=trV[j].firstChild.nextSibling.innerHTML
 var valorV2=trV[j+1].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
 var valorV3=trV[j+2].lastChild.previousSibling.innerHTML
 checkGanador(valorV1,valorV2,valorV3)
 //over=false
 //if(valorV1==valorV2&&valorV2==valorV3&&valorV1!=vacio)over=true;
//    if(over==true)alert(valorV1 + " es el ganador");

//checkeo diagonal inf izq der sup
  valorV1=trV[j].lastChild.previousSibling.innerHTML
  valorV2=trV[j+1].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  valorV3=trV[j+2].firstChild.nextSibling.innerHTML
  checkGanador(valorV1,valorV2,valorV3)

//checkeo vertical col 1
  valorV1=trV[j].firstChild.nextSibling.innerHTML
  valorV2=trV[j+1].firstChild.nextSibling.innerHTML
  valorV3=trV[j+2].firstChild.nextSibling.innerHTML
  checkGanador(valorV1,valorV2,valorV3)

//checkeo vertical col 2
  valorV1=trV[j].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  valorV2=trV[j+1].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  valorV3=trV[j+2].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
   checkGanador(valorV1,valorV2,valorV3)
    
//checkeo vertical col 3
  valorV1=trV[j].lastChild.previousSibling.innerHTML
  valorV2=trV[j+1].lastChild.previousSibling.innerHTML
  valorV3=trV[j+2].lastChild.previousSibling.innerHTML
  checkGanador(valorV1,valorV2,valorV3)
}

function checkGanador(v1,v2,v3){
    over=false;
    if (v1==v2 && v2==v3 && v1!=vacio)
      over=true;
    if (over==true)
        alert(v1 + " es el ganador");
    
}
function checkEmpate(){
    var rows=document.getElementById('board').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    var esEmpate=true
     for(f=0;f<rows.length;f++){
       for(h=0;h<rows[f].getElementsByTagName('td').length;h++){
            var cell = rows[f].getElementsByTagName('td')[h];
            if(cell.innerHTML==vacio){esEmpate=false}
       }
    }
    if(esEmpate==true)alert("Empate")
}

function checkStatusJuego(){
    $val=$("#jugadores").attr("title");
    juegoActivo();
//    if($val=="1")
//    {
//        juegoEnEspera();
//    }
//    else if($val=="2")
//    {
//
//
//    }

}

function juegoActivo()
{
  $("#titulo").text("esperando movimiento adversario")
  started=true;
  intervalo = setInterval("checkTablaActualizada()", delayCall);
}

function juegoEnEspera(){
    $("#titulo").text("Esperando Oponente");
    intervalo = setInterval("consultarOponente()", delayCall);

}
function consultarOponente(){
   $.ajax({
        url: "index.php",
        type: "POST",
        dataType:"json",
        data: ({
            pagina : 'checkOponente',
            jugadores : 2
        }),
        success: iniciaJuego,
        error: mostrarError
    })
  }

function iniciaJuego(datos){
    if(datos.activo==true)
      $("#titulo").text("hacer jugada");
    started=true;
}


function checkTablaActualizada(){
  $("#titulo").text("Chequea");
  //areaJuego
  $.ajax({
        url: "index.php",
        type: "POST",
        dataType:"html",
        data: ({
            pagina : 'actualizarTabla',
            id : id_actual
        }),
        success: actualizaTabla,
        error: mostrarError
    })
  

}

function actualizaTabla(jugada){
  //alert(jugada);

  if(jugada!=undefined){
    $('#areaJuego').html(jugada);
    //checkResult();
    //checkEmpate();

    var esCruz;
    $("#titulo").text("hacer jugada");
    $.ajax({
        url: "index.php",
        type: "POST",
        dataType:"json",
        data: ({
            pagina : 'esMiTurno'
        }),
        success: esMiTurno,
        error: mostrarError
    })
  }
}

function enviarDatos(unObjeto)
{
  $("#titulo").text("Enviando Jugada");
  $.ajax({
    url: "index.php",
    type: "POST",
    dataType:"json",
    data: ({
      pagina  : "grabarJugada",
      idCampo : unObjeto.attr('id'),
      miTipo  : miTipo
    }),
    success: chequeoEstado,
    error: mostrarError
  })
}
  function chequeoEstado(datos) {
    if (datos.ganador=='empate') {
      alert("Empate!");
    }
    else if (datos.ganador=='j1') {
      if (datos.soyGanador==true) {
        alert("Felicitaciones!!! Has Ganado!");
      }
      if (datos.soyPerdedor==true) {
        alert("Lamentablemente has perdido esta vez!");
      }
    }
    else if (datos.ganador=='j2') {
      if (datos.soyGanador==true) {
        alert("Felicitaciones!!! Has Ganado!");
      }
      if (datos.soyPerdedor==true) {
        alert("Lamentablemente has perdido esta vez!");
      }
    }
  }

  function seleccionarXO(mensaje){
    if(mensaje=="seleccionarXO"){
        $("#X").attr("disabled",false);
        $("#O").attr("disabled",false);
    }else if(mensaje=="SinJugador"){

    }
  }

  function mostrarError()
  {
      //alert("ERROR!");
  }