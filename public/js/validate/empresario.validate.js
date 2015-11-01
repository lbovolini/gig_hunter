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


// mascaras
$(document).ready(function(){
	$("#telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
    $("#data_nascimento").mask("99/99/9999");
    //$("#rg").mask("99.999.999-*");
    $("#cpf").mask("999.999.999-99", {reverse: true});
    $("#cep").mask("99999-999");
});



// valida campos
$(function() {
	$("#register-form").validate({
		rules: {
			nome: {
				required: true,
				lettersonly: true
			},
			email: {
				required: true,
				email: true,
                remote:
                {
                  url: '/Validate/email.php',
                  type: "post",
                  data:
                  {
                      email: function()
                      {
                          return $('#register-form :input[id="email"]').val();
                      }
                  }
                }
			},
			confirmacao_email: {
				required: true,
				equalTo: "#email"
			},
			username: {
				required: true,
				loginRegex: true,
                remote:
                {
                  url: '/Validate/username.php',
                  type: "post",
                  data:
                  {
                      email: function()
                      {
                          return $('#register-form :input[id="username"]').val();
                      }
                  }
                }
			},
			senha: {
				required: true,
				minlength: 8
			},
			confirmacao_senha: {
				required: true,
				equalTo: "#senha"
			},

			data_nascimento: {
				required: true,
				date: true
			},
			telefone: {
				required: true
			},
			rg: {
				required: true,
				loginRegex: true,
                remote:
                {
                  url: '/Validate/rg.php',
                  type: "post",
                  data:
                  {
                      email: function()
                      {
                          return $('#register-form :input[id="rg"]').val();
                      }
                  }
                }
			},
			cpf: {
				required: true,
				cpfBR: true,
                remote:
                {
                  url: '/Validate/cpf.php',
                  type: "post",
                  data:
                  {
                      email: function()
                      {
                          return $('#register-form :input[id="cpf"]').val();
                      }
                  }
                }
			},
			cep: "required",
			rua: {
				required: true
			},
			bairro: "required",
			estado: "required",
			cidade: "required"

		},
		messages: {
			email: {
				remote: jQuery.validator.format("{0} já registrado.")
			},
			username: {
				remote: jQuery.validator.format("{0} já registrado.")
			},
			rg: {
				remote: jQuery.validator.format("{0} já registrado.")
			},
			cpf: {
				remote: jQuery.validator.format("{0} já registrado.")
			}
		},

		submitHandler: function(form) {
			form.submit();
		}
	});
});


// carrega script de mensagens do validator traduzidas
$.getScript("/public/js/validate/validator.messages.js", function(){

});


// carrega script que valida o CPF
$.getScript("/public/js/validate/jquery.validate.cpf.js", function(){

});