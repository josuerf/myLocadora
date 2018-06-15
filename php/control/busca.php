<?php

session_start();
if ($_SESSION["tipo_usuario"] === 'cliente') {
    header("Location: ../view/principal_func.php");
} elseif (!isset($_SESSION["tipo_usuario"])) {
    header("Location: ../../index.php");
}
include '../model/crudLocadora.php';
$SPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$resultado = array();
if (!isset($SPost["palavra"])) {
    $resultado = visualizarTodosFilmes();
} else {
    $pesquisa = $SPost["palavra"];
    if ($pesquisa === 'tudo') {
        $resultado = visualizarTodosFilmes();
    } else {
        $resultado = mostrarFilmePorChave($pesquisa);
    }
}
if ($resultado) {
    foreach ($resultado as $data) {
        echo '<tr>', '<td>', $data['nome'], '</td>',
        '<td>', $data['genero'], '</td>',
        '<td>', 'R$ ', str_replace(".", ",", $data['preco']), '</td> '
        , '<td>', $data['duracao'], '</td> '
        , '<td class="actions text-right"> '
        , ' <a href="editar_filme.php?id_filme=',
        $data['id'], '&', 'nomeFilme=', $data['nome'], '&', 'genero=', $data['genero'], '&', 'preco=', $data['preco'],
        '&', 'duracao=', $data['duracao'],
        '" class="btn btn-sm btn-warning">',
        '<i class="fa fa-pencil"></i>', ' Editar</a> ',
        '<button type = "button" class = "btn btn-sm btn-danger" data-name="', $data['nome'], '" data-id="', $data['id'], '" data-toggle = "modal" data-target = "#exampleModalCenter">
        <i class = "fa fa-trash"></i> Excluir
        </button>
        </td>
        </tr>';
    }
} else {
    echo '<tr>
    <td colspan = "6">Nenhum registro encontrado.</td>
    </tr>';
}
?>