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
                header("Location: ../view/principal_cliente.php");
            } else if ($usuarioR['tipo_usuario'] === 'funcionario') {
                session_start();
                $_SESSION["id_usuario"] = $usuarioR['id'];
                $_SESSION["nome"] = $usuarioR['nome'];
                $_SESSION["tipo_usuario"] = $usuarioR['tipo_usuario'];
                header("Location: ../view/principal_func.php");
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Erro! Nome de Usuário ou Senha, Inválidos.");
            window.location = '../../index.php';  
        </script>
        <?php

    }
} elseif ($opcao === 'Registrar') {
    $nome = $SecurePOST["nomeUsuarioR"];
    $senha = $SecurePOST["senha"];
    $email = $SecurePOST["email"];
    $tipo = $SecurePOST["tipoUsuario"];
    cadastrarUsuario($nome, $senha, $email, $tipo);
    echo "<script>alert('Sucesso! Usuário Cadastrado.');</script>";
    echo "<script>window.location = '../../index.php';</script>";
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
        echo "<script>alert('Sucesso! Filme Cadastrado.');</script>";
        echo "<script>window.location = '../view/cadastrar_filme.php';</script>";
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
    echo "<script>alert('Sucesso! Filme Atualizado.');</script>";
    echo "<script>window.location = '../view/principal_func.php';</script>";
}

//GET
if ($SecureGET["opcao"] === "ExcluirFilme") {
    if (!$session) {
        session_start();
        $session = 1;
    }
    if ($_SESSION["tipo_usuario"] === 'funcionario') {
        excluirFilme($SecureGET["id_filme"]);
        echo "<script>alert('Sucesso! Filme Excluído.');</script>";
        echo "<script>window.location = '../view/principal_func.php';</script>";
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