$(document).ready(function () {
    $('#formlogin').submit(function () {
        var login = $('#nomeUsuario').val();
        var senha = $('#senha').val();
        $.ajax({
            url: "/locadora/php/control/controleLocadora.php",
            type: "POST", 
            data: "nomeUsuario=" + login + "&senha=" + senha,
            success: function (result) {
                if (result === 1) {
                    location.href = '/php/view/principal_cliente.php';
                } else if (result === 2) {
                    location.href = '/php/view/principal_func.php';
                } else {
                    alert("Erro! Nome de Usuário ou Senha, Inválidos.");
                }
            }
        });
        return false;
    });
});