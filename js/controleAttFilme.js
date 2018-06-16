function do_update(){
    var id = $("#id_filme").val();
    $.ajax({
        type: "POST",
        url: "../control/controleLocadora.php",
        data: {
            opcao: "AtualizarFilme",
            id_filme: id,
            nomeFilme: $("#nomeFilme").val(),
            genero: $("#genero").val(),
            preco: $("#preco").val(),
            duracao: $("#duracao").val()
        },
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
