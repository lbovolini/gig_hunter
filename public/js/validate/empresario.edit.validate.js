// carrega script com metodos adicionais
$.getScript("/public/js/validate/metodos.js", function(){

});

// carrega script com marcaras de entrada
$.getScript("/public/js/validate/masks.js", function(){

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
				email: true
				/*,
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
                }*/
			},
			confirmacao_email: {
				required: true,
				equalTo: "#email"
			},
			username: {
				required: true,
				loginRegex: true
				/*,
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
                }*/
			},
			senha_atual: {
				required: true
			},
			senha: {
				//required: true,
				minlength: 8
			},
			confirmacao_senha: {
				//required: true,
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
				loginRegex: true
				/*,
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
                }*/
			},
			cpf: {
				required: true,
				cpfBR: true
				/*,
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
                }*/
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