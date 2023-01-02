function CalcularNif(inp_nif){
    var nif = inp_nif.value;
    var letrasnif = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
    //console.log(nif);
    if(nif.length == 9){
        var numeros = nif.substr(0,8);
        //console.log(numeros);
        var letra = nif.substr(-1,1);
        for( num of numeros){
            if(parseInt(num)){
                total_num = Math.floor(parseInt(numeros) % 23);
                if(letrasnif[total_num] == letra.toUpperCase()){
                    inp_nif.style.borderColor = "black";
                }else{
                    inp_nif.value="";
                    inp_nif.placeholder = "nif no es correcta";
                    inp_nif.style.borderColor = "red";
                }
            }
            else
            {
                inp_nif.value="";
                inp_nif.placeholder = "nif no es correcta";
                inp_nif.style.borderColor = "red";
                break;
            }
        }
       
    }
    else
    {
        inp_nif.value="";
        inp_nif.placeholder = "nif no es correcta";
        inp_nif.style.borderColor = "red";
    }
}
function BuscarProv(paisid){
    var data = { 'paisid':paisid }
    $.post('controller/clientes_ajax.php',data,function(p){
        //alert(p);
        var option = document.getElementById('prov');
        option.innerHTML = p;
        
    });
}
function BuscarPobla(proviid){
    
    var data = { 'provinciaid':proviid }
    $.post('controller/clientes_ajax.php',data,function(h){
        //alert(h);
        var option = document.getElementById('pobla');
        
        option.innerHTML = h;
        
    });
    
}
function BuscarZip(idzip){       
        var zip = document.getElementById('zip');
        zip.value = idzip;
        var data = { 'idzip':idzip }
        $.post('controller/clientes_ajax.php',data,function(j){
            //alert(h);
            var option = document.getElementById('direc');
            
            option.innerHTML = j;
            
        });
}
function BuscarCalle(idzip){
    //alert(idzip);
    /*
    
    */
}

function CambiarInput(myname){ 
 
    var div = document.getElementById('direcamano');   
    div.innerHTML = '<input class="form-control" type="text" name="'+myname+'" id="'+myname+'" />';
    
}