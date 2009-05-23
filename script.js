$(document).ready(eventos);
    var over=false
function eventos(){
    td=$('td');
    td.click(validar);
}
function validar(){
    //validar si ya tiene algo en el campo
    var XO=$('input[name=XO]:checked').val()
    $(this).text(XO)
if(over==false)checkResult()

}
function checkResult(){

    var rows = document.getElementById('board').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  for(n=0;n<rows.length;n++){       //checkeo horizontal
    var tr = document.getElementsByTagName("tr")[n];
    var valor1=tr.firstChild.nextSibling.innerHTML
    var valor2=tr.firstChild.nextSibling.nextSibling.nextSibling.innerHTML
    var valor3=tr.lastChild.previousSibling.innerHTML
    over=false
    if(valor1==valor2&&valor2==valor3&&valor1!="&nbsp;&nbsp;&nbsp;")over=true;
    if(over==true)alert(valor1 + " es el ganador");
   }

 //checkeo diagonal sup izq der abajo
 var j=0
 var trV = document.getElementsByTagName("tr");
 var valorV1=trV[j].firstChild.nextSibling.innerHTML
 var valorV2=trV[j+1].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
 var valorV3=trV[j+2].lastChild.previousSibling.innerHTML
 over=false
 if(valorV1==valorV2&&valorV2==valorV3&&valorV1!="&nbsp;&nbsp;&nbsp;")over=true;
    if(over==true)alert(valor1 + " es el ganador");

//checkeo diagonal inf izq der sup
  valorV1=trV[j].lastChild.previousSibling.innerHTML
  valorV2=trV[j+1].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  valorV3=trV[j+2].firstChild.nextSibling.innerHTML
  over=false
  if(valorV1==valorV2&&valorV2==valorV3&&valorV1!="&nbsp;&nbsp;&nbsp;")over=true;
    if(over==true)alert(valor1 + " es el ganador");

//checkeo vertical col 1
  valorV1=trV[j].firstChild.nextSibling.innerHTML
  valorV2=trV[j+1].firstChild.nextSibling.innerHTML
  valorV3=trV[j+2].firstChild.nextSibling.innerHTML
  over=false
   if(valorV1==valorV2&&valorV2==valorV3&&valorV1!="&nbsp;&nbsp;&nbsp;")over=true;
    if(over==true)alert(valor1 + " es el ganador");

//checkeo vertical col 2
  valorV1=trV[j].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  valorV2=trV[j+1].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  valorV3=trV[j+2].firstChild.nextSibling.nextSibling.nextSibling.innerHTML
  over=false
  if(valorV1==valorV2&&valorV2==valorV3&&valorV1!="&nbsp;&nbsp;&nbsp;")over=true;
    if(over==true)alert(valor1 + " es el ganador");
    
//checkeo vertical col 3
  valorV1=trV[j].lastChild.previousSibling.innerHTML
  valorV2=trV[j+1].lastChild.previousSibling.innerHTML
  valorV3=trV[j+2].lastChild.previousSibling.innerHTML
  over=false
  if(valorV1==valorV2&&valorV2==valorV3&&valorV1!="&nbsp;&nbsp;&nbsp;")over=true;
    if(over==true)alert(valor1 + " es el ganador");
}
