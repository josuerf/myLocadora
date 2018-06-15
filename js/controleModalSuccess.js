$('#modalSuccess').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var body = button.data('txtBody');
    var title = button.data('txtTitle');
    var modal = $(this);
    var url = button.data("url");
    modal.find('.modal-body').text(body);
    modal.find('#modalSuccessTitle').text(title);
    modal.finf('#confirmModal').attr('href',url);
});