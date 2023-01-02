function CogerRuta(name){   
    var nombre = document.getElementById('nombre');
    var input = document.getElementsByName(name)[0];
    var fichero = input.value;
    var pos = fichero.lastIndexOf('\\');
    var filename = fichero.substr(pos+1,fichero.length);
    nombre.value = filename;
}
function CambiarMetodo(metodo){    
    var form = document.getElementById('form');
    if(metodo == 1){ form.method = "get";}else if(metodo==2){form.method = "post";}
    
}
$(document).ready(function(){$('#ListadoUsuarios').DataTable();});