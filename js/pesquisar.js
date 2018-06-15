$(function () {
    $('#pesquisa').keyup(function () {
        var pesquisa = $(this).val();
        if (pesquisa !== '') {
            var dados = {
                palavra: pesquisa
            };
            $.post('/locadora/php/control/busca.php', dados, function (retorna) {
                $('.table-results').html(retorna);
            });
        } else {
            var dados = {
                tudo: 'tudo'
            };
            $.post('/locadora/php/control/busca.php', dados, function (retorna) {
                $('.table-results').html(retorna);
            });
        }
    });
});

