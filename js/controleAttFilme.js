function do_update(){
    $.ajax({
        type: "POST",
        url: "../control/controleLocadora.php",
        data: {
            opcao: "AtualizarFilme",
            id_filme: $("#id_filme").val(),
            nomeFilme: $("#nomeFilme").val(),
            genero: $("#genero").val(),
            preco: $("#preco").val(),
            duracao: $("#duracao").val()
        },
        dataType: "text"
    }).done(function (result) {
        if (result === '1') {
            $("#modalSuccess").modal('show');
            $("#modalSuccess").find('.modal-body').text("Filme Atualizado Com Sucesso!");
            $("#modalSuccess").find('#modalSuccessTitle').text("Atualizar Filme");
            $("#modalSuccess").find('#confirmModal').attr('href', "../view/principal_func.php");
        }
    });
    return false;
}
