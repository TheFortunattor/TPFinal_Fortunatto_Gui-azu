var editando = false, nombres = ["Titulo","Cilindrada","Año","Precio","Imagen"]; //variable es para tener guardado los nombres de las id's de los inputs, así lo manipulo en el for
function editar(nodo){
if(!editando){
  editando=true;
  var nodoPadre = nodo.parentNode, nuevoHTML = "";
  for(var i=0;i<5;i++){ nuevoHTML = nuevoHTML + "<td>"  + "<input type='text' name='" + nombres[i] + "' size='10' value='" + nodoPadre.childNodes[i].firstChild.nodeValue + "' ></td>"}
  nuevoHTML = nuevoHTML + "<td>En edición</td>";
  nodoPadre.innerHTML = nuevoHTML;
  nodoPadre.id = "modificado";
  document.getElementById('botones').style.display = "inline";
}else{alert("Solo se puede editar una línea. Recargue la página para poder editar otra");}
}
function enviarForm(){
var crearForm = "<form id='formulario' action='http://www.aprenderaprogramar.es' method='get'>"
var nodoModificado = document.getElementById('modificado');
var nodoBotones = document.getElementById('botones');
for(var i=0;i<5;i++){
 crearForm = crearForm + "<input type='text' name='" + nombres[i] + "' value='" + nodoModificado.childNodes[i].firstChild.value + "' >";
 }
 nodoBotones.innerHTML = crearForm;
 document.getElementById('formulario').submit();
}