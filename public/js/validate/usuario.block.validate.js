// carrega script com metodos adicionais
$.getScript("/public/js/validate/metodos.js", function(){

});

// carrega script com marcaras de entrada
$.getScript("/public/js/validate/masks.js", function(){

});


// valida campos
$(function() {
	$("#data_block").validate({
		rules: {
			data_bloqueio: {
				required: true,
				datetime: true
			}
		});
	},  	
	submitHandler: function(form) {
			form.submit();
	}
});


// carrega script de mensagens do validator traduzidas
$.getScript("/public/js/validate/validator.messages.js", function(){

});