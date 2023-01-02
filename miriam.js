const Fotos = [
    'https://d500.epimg.net/cincodias/imagenes/2020/08/12/fortunas/1597256692_326870_1597257318_noticia_normal.jpg',
    'https://cdn.autobild.es/sites/navi.axelspringer.es/public/styles/480/public/media/image/2017/10/gama-maserati-2018.jpg?itok=r_cOkH-N',
    'https://www.autopista.es/uploads/s1/10/73/50/17/los-coches-mas-atractivos-de-todos-los-tiempos-segun-la-ciencia.jpeg',
    'https://media.revistagq.com/photos/5d89c9335d07090008d92dd6/16:9/w_2560%2Cc_limit/2020-mclaren-senna-mmp-1545234547.jpg',
    'https://media.revistagq.com/photos/5ca5efbf4c7adb0cc800d0dc/master/pass/coches_instagram_1493.jpg',
    'https://rentingfinders.com/wp-content/uploads/2020/12/bugatti-veyron-curiosidades-coches.jpg'
    ];

    document.write('<article class="container">');
    document.write('<div class="row">');
    let cantidad = Fotos.length;
    
    //Metodo 1
    let j = 0; //Esto es un contador
    for (i=0; i<cantidad; i++) {
    document.write('<div class="col-lg-6"><img id="foto" src="' + Fotos[j] + '" alt="" /></div><div class="col-lg-6"><img id="foto" src="' + Fotossss[k] + '" alt="" /></div>');
    j++;
    };
    
    //Metodo 2
    let k = 0; //Esto es otro contador
    for (url in Fotos){
    document.write('<div class="col-lg-6"><img id="foto" src="' + Fotos[url] + '" alt="" /></div>');
    k++;
    };
    
    //Metodo 3
    for (url of Fotos){
    document.write('<div class="col-lg-6"><img id="foto" src="' + url + '" alt="" /></div>');
    }
    
    document.write('</div>');
    document.write('</article>');