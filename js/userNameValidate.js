$(function () {
    $('#nomeUsuarioR').keyup(function () {
        var pesquisa = $(this).val();
        if (pesquisa !== '') {
            var dados = {
                palavra: pesquisa
            };
            $.post('/locadora/php/control/buscaUserName.php', dados, function (retorna) {
                if (retorna === '1') {
                    $('#nomeUsuarioR').addClass('alert-danger');
                    $('#usuarioResult').show();
                } else {
                    if ($('#nomeUsuarioR').hasClass('alert-danger')) {
                        $('#nomeUsuarioR').removeClass('alert-danger');
                    }
                    $('#usuarioResult').hide();
                }
            });
        } else {
            if ($('#nomeUsuarioR').hasClass('alert-danger')) {
                $('#nomeUsuarioR').removeClass('alert-danger');
            }
            $('#usuarioResult').hide();
        }
    });
});
$(function () {
    $('#emailR').keyup(function () {
        var pesquisa = $(this).val();
        if (pesquisa !== '') {
            var dados = {
                palavra: pesquisa
            };
            $.post('/locadora/php/control/buscaEmail.php', dados, function (retorna) {
                if (retorna === '1') {
                    $('#emailR').addClass('alert-danger');
                    $('#emailResult').show();
                } else {
                    if ($('#emailR').hasClass('alert-danger')) {
                        $('#emailR').removeClass('alert-danger');
                    }
                    $('#emailResult').hide();
                }
            });
        } else {
            if ($('#emailR').hasClass('alert-danger')) {
                $('#emailR').removeClass('alert-danger');
            }
            $('#emailResult').hide();
        }
    });
});

