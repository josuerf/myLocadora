<?php

include '../model/crudLocadora.php';
$SPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$resultado = array();
if (!isset($SPost["palavra"])) {
    echo 0;
} else {
    $pesquisa = $SPost["palavra"];
    $resultado = buscaNomeUsuario("",$pesquisa);
}
if ($resultado) {
    echo 1;

} else {
    echo 0;
}
?>