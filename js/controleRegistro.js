function validarForm() {
    usuarioResult = document.getElementById('usuarioResult');
    nome = document.getElementById('nomeUsuarioR').value;
    email = document.getElementById('emailR').value;
    senha = document.getElementById('senha').value;
    re_senha = document.getElementById('re_senha').value;
    if (nome.length > 3 && senha.length > 3) {
        if ($('#emailInvalid').is(':visible')) {
            alert("E-Mail Inválido! \nPor favor, insira um e-mail válido");
        } else if (senha !== re_senha) {
            alert("As Senhas Não Coincidem!\nFavor, Tente Novamente.");
        } else {
            if ($('#usuarioResult').is(':visible') && $('#emailResult').is(':visible')) {
                alert("Erro! \nNome de Usuário e E-mail Já Existem.");
            } else if ($('#usuarioResult').is(':visible')) {
                alert("Erro! \nNome de Usuário Já Existe.");
            } else if ($('#emailResult').is(':visible')) {
                alert("Erro! \nE-Mail Já Existe.");
            } else {
                $.ajax({
                    type: "POST",
                    url: "../control/controleLocadora.php",
                    data: {
                        opcao: "Registrar",
                        nomeUsuarioR: nome,
                        senha: senha,
                        email: email,
                        tipoUsuario: $("#tipoUsuario").val()
                    }
                }).done(function () {
                    $("#modalSuccess").modal('show');
                    $("#modalSuccess").find('.modal-body').text("Usuário Cadastrado com Sucesso!");
                    $("#modalSuccess").find('#modalSuccessTitle').text("Cadastro Usuario");
                    $("#modalSuccess").find('#confirmModal').attr('href', "../../index.php");
                });
            }
        }
    } else {
        alert("Os campos deve ter pelo menos 4 caracteres!");
    }
}

$('#emailR').focusout(function () {
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = $("#emailR").val();
    if (!filter.test(email) && email !== '') {
        $('#emailR').addClass('alert-danger');
        $('#emailInvalid').show();
    } else {
        if ($('#emailR').hasClass('alert-danger')) {
            $('#emailR').removeClass('alert-danger');
        }
        $('#emailInvalid').hide();
    }
});