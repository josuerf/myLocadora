function do_mregister() {
    $.ajax({
        type: "POST",
        url: "../control/controleLocadora.php",
        data: {
            opcao: "CadastrarFilme",
            nomeFilme: $("#nomeFilme").val(),
            genero: $("#genero").val(),
            preco: $("#preco").val(),
            duracao: $("#duracao").val()
        },
        dataType: "text"
    }).done(function (result) {
        if (result === '1') {
            $("#modalSuccess").modal('show');
            $("#modalSuccess").find('.modal-body').text("Filme Cadastrado Com Sucesso!");
            $("#modalSuccess").find('#modalSuccessTitle').text("Cadastro de Filme");
            $("#modalSuccess").find('#confirmModal').attr('href', "../view/principal_func.php");
        }
    });
    return false;
}
