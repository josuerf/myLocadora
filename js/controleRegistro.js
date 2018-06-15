function validarForm() {
    usuarioResult = document.getElementById('usuarioResult');
    nome = document.getElementById('nomeUsuarioR').value;
    email = document.getElementById('emailR').value;
    senha = document.getElementById('senha').value;
    re_senha = document.getElementById('re_senha').value;
    if (nome.length > 3 && senha.length > 3 && email.length > 3) {
        if (senha !== re_senha) {
            alert("As Senhas Não Coincidem!\nFavor, Tente Novamente.");
        } else {
            if ($('#usuarioResult').is(':visible') && $('#emailResult').is(':visible')) {
                alert("Erro! Nome de Usuário e E-mail Já Existem.");
            } else if ($('#usuarioResult').is(':visible')) {
                alert("Erro! Nome de Usuário Já Existe.");
            } else if ($('#emailResult').is(':visible')) {
                alert("Erro! E-Mail Já Existe.");
            } else {
                document.formRegistro.submit();
            }
        }
    } else {
        alert("Os campos deve ter pelo menos 4 caracteres!");
    }
}