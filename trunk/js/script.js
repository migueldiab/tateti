$(document).ready(eventos);
    var over=false
    var vacio="&nbsp;&nbsp;&nbsp;"
    

function eventos(){
    $("#nuevoJuego").click(borrar)
    td=$('td');
    td.click(validar);
}
function validar(){
    //validar si ya tiene algo en el campo
    var XO=$('input[name=XO]:checked').val()
    if(over==false){$(this).text(XO)}
    if(over==false)checkResult()
    checkEmpate()
}
function borrar(){
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