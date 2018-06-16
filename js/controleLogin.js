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
                    $("#modalSuccess").find('#confirmModal').attr('href', "index.php");
                }
            })
            .fail(function (xhr, status, errorThrown) {
                $("#modalSuccess").modal('show');
                $("#modalSuccess").find('.modal-body').text("Erro! Código: " + status + "\nMensagem: " + errorThrown);
                $("#modalSuccess").find('#modalSuccessTitle').text("Erro de Login");
                $("#modalSuccess").find('#confirmModal').attr('href', "index.php");
                console.dir(xhr);
            });
    return false;
}