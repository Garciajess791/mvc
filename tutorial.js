var Videos = ['https://www.youtube.com/embed/vQErlau7mf8','https://www.youtube.com/embed/X895tUYxDgo','https://www.youtube.com/embed/KYRmBjXnYgI','https://www.youtube.com/embed/vQErlau7mf8','https://www.youtube.com/embed/E3owu7-kkDo','https://www.youtube.com/embed/QA0zU7e1hxc'];
var Galeria = document.getElementById('Galeria');
i=0;
document.write('<div class="row">');   
for( video in Videos){
      
    if(Videos[video] != ""){        
        document.write('<div class="col-lg-4" >');
  
        document.write('<div allowfullscreen ><iframe  width="350" height="150" src="'+Videos[i]+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" ></iframe> </div>');
        document.write('<div class="btn btn-danger" >MAX</div>');
        document.write('</div>');      
    }
    if(Videos[video+1] != undefined){ 
        document.write('<div class="col-lg-4" >');    
        document.write('<iframe width="350" height="150" src="'+Videos[i+1]+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        document.write('<div class="btn btn-danger" >MAX</div>');
        document.write('</div>'); 
    }
    if(Videos[video+2] != undefined){ 
        document.write('<div class="col-lg-4" >');    
        document.write('<iframe width="350" height="150" src="'+Videos[i+2]+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>');
        document.write('<div class="btn btn-danger">MAX</div>');
        document.write('</div>'); 
    }
    
    i++;
}
document.write('</div>'); 
document.gelElementById('Galeria').addEventListener.onclick = function(){
   
    AbrirVideo(src);
    console.log(src);
    window.open(src , '_blank',autoplay);
}
