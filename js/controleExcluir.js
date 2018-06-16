$('#exampleModalCenter').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var modal = $(this);
    modal.find('.modal-body').text('Você tem certeza que quer excluir ' + '"' +name+ '"' + ' ?');
    modal.find('#confirmarExclusao').attr('href', '../control/controleLocadora.php?opcao=ExcluirFilme&id_filme=' + id);
});
