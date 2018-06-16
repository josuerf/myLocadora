function do_login() {
    var login = $("#nomeUsuario").val();
    var senha = $("#senha").val();
    $.ajax({
        url: "php/control/controleLocadora.php",
        type: "POST",
        data: {
            nomeUsuario: login,
            senha: senha,
            opcao: "Logar"
        },
        dataType: "text"
    })
            .done(function (result) {
                if (result === '1') {
                    location.href = 'php/view/principal_cliente.php';
                } else if (result === '2') {
                    location.href = 'php/view/principal_func.php';
                } else {
                    $("#modalSuccess").modal('show');
                    $("#modalSuccess").find('.modal-body').text("Erro! Usuário ou Senha Inválidos.");
                    $("#modalSuccess").find('#modalSuccessTitle').text("Erro de Login");
                }
            })
            .fail(function (xhr, status, errorThrown) {
                alert("Desculpe, Ocorreu algum Problema!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            });
    return false;
}