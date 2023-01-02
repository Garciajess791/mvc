
window.onload = function(){    
    //evento al cargar el documento en el navegador.  
   }
   
   var InpNombre = document.getElementById('validationCustom01');
   InpNombre.onchange = function(){
       var valorn = InpNombre.value;
       if(valorn.length > 3){
           InpNombre.style.borderColor = "black";
       }
       else
       {
           InpNombre.style.borderColor = "red";
           InpNombre.placeholder = "El nombre ha de ser mayor que 3 carácteres"
       }
   }
   
   var inp_nif = document.getElementById('nif');
   
   inp_nif.onchange = function(){
       CalcularNif(inp_nif);
   }
   
   /* Funciones personalizadas */
   
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
   
   function PrecargaFoto(){
      
       $(document).change(function() {
           var file = document.querySelector('#carga-foto').files[0];
           console.log(file);
           var blob = URL.createObjectURL(file);
           document.querySelector('#pre-foto').src = blob;
       });
   }