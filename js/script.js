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
var miTurno = false;
var noInterval = 0;
function eventos(){
 //   $("#nuevoJuego").click(borrar)
    checkStatusJuego();
    td=$('td');
    td.click(validar);
}

function esMiTurno() {
  this.miTurno = true;
}
function validar()
{
  //alert ("validando");

  //validar si ya tiene algo en el campo
  // var XO=$('input[name=XO]:checked').val()
  if(over==true)
  {
    alert("juego ya terminado");
  }
  else if(miTurno!=true)
  {
    alert("no es mi turno o juego no iniciado");
  }
  else if(started!=true)
  {
    alert("juego no iniciado aun, o aguardando oponente");
  }
  else
  {
    if($(this).text()=="")//innerhtml???
    {
      enviarDatos($(this));
    }
    else
    {
      alert("el campo ya esta marcado");
    }
    //if(over==false&&checkPreviousClick()==true){$(this).text(XO)}
//    if(over==false) {
//      checkResult()
//    }
//    checkEmpate();
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
    over=false
    if(v1==v2&&v2==v3&&v1!=vacio)over=true;
    if(over==true)alert(v1 + " es el ganador");
    
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
    if($val=="1"){
        juegoEnEspera();
    }else if($val=="2"){
        juegoActivo();
    }

}

function juegoActivo()
{
  $("#titulo").text("esperando movimiento adversario")
  started=true;
  miTurno=false;
  miTipo=0;
  intervalo = setInterval("checkTablaActualizada()", delayCall);
}

function juegoEnEspera(){
    miTipo=1;
    $("#titulo").text("Esperando Oponente");
    intervalo = setInterval("consultarOponente()", delayCall);

}
function consultarOponente(){
   $.ajax({
        url: "lib/checker.php",
        type: "POST",
        dataType:"json",
        data: ({
            tipo : "checkOponente"
        }),
        success: iniciaJuego,
        error: mostrarError
    })
  }

function iniciaJuego(datos){
    if(datos!=undefined){
    if(datos.activo=='true'){
      $("#titulo").text("hacer jugada");
    started=true;
    miTurno=true;
    clearInterval(intervalo);
    }
}
}


function checkTablaActualizada(){
  if(miTurno==false){
     $("#titulo").text("esperando movimiento adversario");
  }else{
     $("#titulo").text("");
  }
  $.ajax({
        url: "lib/ActualizaTabla.php",
        type: "POST",
        dataType:"json",
        data: ({
            tipo : miTipo

        }),
        success: actualizaTabla,
        error: mostrarError
    })
  }
  //areaJuego
 // $("#areaJuego").load("index.php", {
  //    pagina : "actualizarTabla",
  //    id : id_actual
 //   });

//}

function actualizaTabla(jugada){
  if(jugada!=undefined){
      if(jugada.idJugada!=-1){
      var esCruz;
      if (jugada.es_cruz=='1'){
          esCruz="X";
      }else{
          esCruz="O";
      }
      var idCampo=jugada.idCampo;
      $('#'+idCampo).text(esCruz);
      id_actual=jugada.idJugada;
      if(miTurno==true){
          miTurno=false;
          $("#titulo").text("esperar movimiento oponente");
          intervalo = setInterval("checkTablaActualizada()", delayCall);
      }else if(miTurno==false){
          miTurno=true;
          $("#titulo").text("hacer jugada");
           clearInterval(intervalo);
      }
  }
}
}

function enviarDatos(unObjeto)
{
  $("#titulo").text("Enviando Jugada");
  $.ajax({
    url: "lib/checker.php",
    type: "POST",
    dataType:"json",
    data: ({
      tipo : "grabarJugada",
      idCampo : unObjeto.attr('id'),
      esCruz : miTipo
    }),
    success: actualizaTabla,
    error: mostrarError
  })
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
      alert("ERROR!");
  }