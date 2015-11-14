// somente letras, numeros e hifen
$.validator.addMethod("loginRegex", function(value, element) {
    return this.optional(element) || /^[a-z0-9]+$/i.test(value);
}, "Deve conter somente letras e números.");


$(function() {
	$("#login-form").validate({
		rules: {
			username: {
				required: true,
				loginRegex: true
			},
			senha: {
				required: true,
				minlength: 8
			},
		},

		submitHandler: function(form) {
			form.submit();
		}
	});
});


// carrega script de mensagens do validator traduzidas
$.getScript("/public/js/validate/validator.messages.js", function(){

});