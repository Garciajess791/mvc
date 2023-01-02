/* Declaración de variables */
const Fotos = [
    'https://d500.epimg.net/cincodias/imagenes/2020/08/12/fortunas/1597256692_326870_1597257318_noticia_normal.jpg',
'https://cdn.autobild.es/sites/navi.axelspringer.es/public/styles/480/public/media/image/2017/10/gama-maserati-2018.jpg?itok=r_cOkH-N',
'https://www.autopista.es/uploads/s1/10/73/50/17/los-coches-mas-atractivos-de-todos-los-tiempos-segun-la-ciencia.jpeg',
'https://media.revistagq.com/photos/5d89c9335d07090008d92dd6/16:9/w_2560%2Cc_limit/2020-mclaren-senna-mmp-1545234547.jpg',
'https://media.revistagq.com/photos/5ca5efbf4c7adb0cc800d0dc/master/pass/coches_instagram_1493.jpg'];
const Detalles = {width:150, height:75, alt:"Fotos sobre coches"};  
/* Proceso */
document.write('<article class="container">');
for(i=0;i<Fotos.length; i++){
    
    document.write('<div class="row">');
    if(Fotos[i] == ""){ }else{
      
        document.write('<div class="col-lg-6"><img id="foto" width="'+Detalles.width+'" height="'+Detalles.height+'" src="'+Fotos[i]+'" alt="'+Detalles.alt+'" /></div>'); 
     
    }
    if(Fotos[i+1] == undefined){ }else{
     
        document.write('<div class="col-lg-6"><img id="foto" width="'+Detalles.width+'" height="'+Detalles.height+'" src="'+Fotos[i+1]+'" alt="'+Detalles.alt+'" /></div>'); 
      
    }  
    document.write('</div>'); 
    i++;
}

document.write('</article>');

function $GET(variable) {
    const valor = window.location.search.substring(1);
    console.log(valor);
    var vars = valor.split("&");
    alert(vars);
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return false;
}