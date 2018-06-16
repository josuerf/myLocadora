<?php

include_once '../model/crudLocadora.php';

$SecurePOST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$SecureGET = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$opcao = $SecurePOST["opcao"];
$session = 0;
//POST
if ($opcao === 'Logar') {
    $nome = $SecurePOST["nomeUsuario"];
    $senha = sha1($SecurePOST["senha"]);
    $response = autentica($nome, $senha);
    if ($response) {
        foreach ($response as $usuarioR) {
            if ($usuarioR['tipo_usuario'] === 'cliente') {
                session_start();
                $_SESSION["id_usuario"] = $usuarioR['id'];
                $_SESSION["nome"] = $usuarioR['nome'];
                $_SESSION["tipo_usuario"] = $usuarioR['tipo_usuario'];
                echo '1';
            } else if ($usuarioR['tipo_usuario'] === 'funcionario') {
                session_start();
                $_SESSION["id_usuario"] = $usuarioR['id'];
                $_SESSION["nome"] = $usuarioR['nome'];
                $_SESSION["tipo_usuario"] = $usuarioR['tipo_usuario'];
                echo '2';
            }
        }
    } else {
        echo '0';
    }
} elseif ($opcao === 'Registrar') {
    $nome = $SecurePOST["nomeUsuarioR"];
    $senha = $SecurePOST["senha"];
    $email = $SecurePOST["email"];
    $tipo = $SecurePOST["tipoUsuario"];
    cadastrarUsuario($nome, $senha, $email, $tipo);
} elseif ($opcao === 'CadastrarFilme') {
    if (!$session) {
        session_start();
        $session = 1;
    }
    if ($_SESSION["tipo_usuario"] === 'funcionario') {
        $nome = $SecurePOST["nomeFilme"];
        $genero = $SecurePOST["genero"];
        $preco = str_replace(",", ".", substr($SecurePOST["preco"], 3));
        $duracao = $SecurePOST["duracao"];
        cadastrarFilme($nome, $genero, $preco, $duracao);
    } else {
        echo "<script>alert('Você Não Tem Permissão Necessária Para Isso!');</script>";
        echo "<script>window.location = '../view/principal_cliente.php';</script>";
    }
} elseif ($opcao === 'AtualizarFilme') {
    $nome = $SecurePOST["nomeFilme"];
    $genero = $SecurePOST["genero"];
    $preco = str_replace(",", ".", substr($SecurePOST["preco"], 3));
    $duracao = $SecurePOST["duracao"];
	$idFilme = $SecurePOST["id_filme"];
    atualizaFilme($idFilme,$nome, $genero, $preco, $duracao);
}

//GET
if ($SecureGET["opcao"] === "ExcluirFilme") {
    if (!$session) {
        session_start();
        $session = 1;
    }
    if ($_SESSION["tipo_usuario"] === 'funcionario') {
        excluirFilme($SecureGET["id_filme"]);
        header("Location: ../view/principal_func.php");
    } else {
        echo "<script>alert('Você Não Tem Permissão Necessária Para Isso!');</script>";
        echo "<script>window.location = '../view/principal_cliente.php';</script>";
    }
} elseif ($SecureGET["opcao"] === "Logout") {
    if (!$session) {
        session_start();
        $session = 1;
    }
    session_destroy();
    $session = 0;
    header("Location: ../../index.php");
} elseif ($SecureGET["opcao"] === 'Selecionar') {
    $idUsuario = $SecureGET["idUsuario"];
    $idFilme = $SecureGET["idFilme"];
    comprarFilme($idUsuario, $idFilme);
    header("Location: ../view/principal_cliente.php");
} elseif ($SecureGET["opcao"] === 'RemoverSelecionado') {
    $idUsuario = $SecureGET["idUsuario"];
    $idFilme = $SecureGET["idFilme"];
    removerSelecionado($idUsuario, $idFilme);
    header("Location: ../view/selecao_cliente.php");
}

function mostrarTodosFilmes() {
    $data = visualizarTodosFilmes();
    return $data;
}

function mostrarFilmesSelecionado($idUsuario) {
    $data = mostrarFilmesSelecionados($idUsuario);
    return $data;
}

function mostrarFilmesNSelecionado($idUsuario) {
    $data = mostrarFilmesNSelecionados($idUsuario);
    return $data;
}
