 $(function() {
	$("#login-form").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 8
			}
		},
        messages: {
            password: {
                required: "Senha nao informada",
                minlength: "Sua senha deve ter no minimo 8 caracteres"
            },
            email: "Endereco de email invalido"
        },

		submitHandler: function(form) {
			form.submit();
		}
	});
});
