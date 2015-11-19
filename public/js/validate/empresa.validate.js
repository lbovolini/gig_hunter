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
			razao_social: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			confirmacao_email: {
				required: true,
				equalTo: "#email"
			},
			cnpj: {
				required: true,
				loginRegex: true
			},
			telefone: {
				required: true
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
			cnpj: {
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