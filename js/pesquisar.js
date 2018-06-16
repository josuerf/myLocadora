$(function () {
    $('#pesquisa').keyup(function () {
        var pesquisa = $(this).val();
        if (pesquisa !== '') {
            var dados = {
                palavra: pesquisa
            };
            $.post('/mylocadora/php/control/busca.php', dados, function (retorna) {
                $('.table-results').html(retorna);
            });
        } else {
            var dados = {
                tudo: 'tudo'
            };
            $.post('/mylocadora/php/control/busca.php', dados, function (retorna) {
                $('.table-results').html(retorna);
            });
        }
    });
});

