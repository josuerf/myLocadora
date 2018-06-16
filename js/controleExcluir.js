var id;
$('#exampleModalCenter').on('show.bs.modal', function (event) {
    button = $(event.relatedTarget);
    id = button.data('id');
    var name = button.data('name');
    var modal = $(this);
    modal.find('.modal-body').text('Você tem certeza que quer excluir ' + '"' + name + '"' + ' ?');
});

$('#confirmarExclusao').click(function () {
    $.ajax({
        type: "GET",
        url: "../control/controleLocadora.php",
        data: {
            opcao: "ExcluirFilme",
            id_filme: id
        }
    }).done(function () {
        $("#modalSuccess").modal('show');
        $("#modalSuccess").find('.modal-body').text("Filme Excluído Com Sucesso!");
        $("#modalSuccess").find('#modalSuccessTitle').text("Exclusão de Filme");
        $("#modalSuccess").find('#confirmModal').attr('href',"../view/principal_func.php");
    });
});
