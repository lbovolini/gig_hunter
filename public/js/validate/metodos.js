// somente letras
jQuery.validator.addMethod("lettersonly", function(value, element) 
{
	return this.optional(element) || /^[a-z," "]+$/i.test(value);
}, "Deve conter somente letras.");


// somente letras, numeros e hifen
$.validator.addMethod("loginRegex", function(value, element) {
    return this.optional(element) || /^[a-z0-9]+$/i.test(value);
}, "Deve conter somente letras e números.");


// valida data
/* http://coffeverton.blogspot.com.br/2013/09/validando-datas-em-pt-br-com-jquery.html */
 $.validator.addMethod(  
      "date",  
      function(value, element) {  
           var check = false;  
           var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;  
           if( re.test(value)){  
                var adata = value.split('/');  
                var gg = parseInt(adata[0],10);  
                var mm = parseInt(adata[1],10);  
                var aaaa = parseInt(adata[2],10);  
                var xdata = new Date(aaaa,mm-1,gg);  
                if ( ( xdata.getFullYear() == aaaa ) && ( xdata.getMonth () == mm - 1 ) && ( xdata.getDate() == gg ) )  
                     check = true;  
                else  
                     check = false;  
           } else  
                check = false;  
           return this.optional(element) || check;  
      },  
      "Insira uma data válida"  
 ); 