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
	$("#data_bloqueio").mask("99/99/9999");
    //$("#rg").mask("99.999.999-*");
    $("#cpf").mask("999.999.999-99", {reverse: true});
    $("#cep").mask("99999-999");
});