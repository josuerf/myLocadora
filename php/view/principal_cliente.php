<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../css/geral.css" type="text/css">
        <?php
        session_start();
        if ($_SESSION["tipo_usuario"] === 'funcionario') {
            header("Location: principal_func.php");
        } elseif (!isset($_SESSION["tipo_usuario"])) {
            header("Location: ../../index.php");
        }
        ?>
    <title>FilmeAR</title></head>


    <body class="bg-light">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fa d-inline fa-lg fa-cloud"></i>
                    <b> FilmeAR.com
                        <br> </b>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item bg-primary">
                            <a class="nav-link active" href="#">
                                <i class="fa d-inline fa-film fa-lg"></i>&nbsp;Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="selecao_cliente.php">
                                <i class="fa d-inline fa-lg fa-shopping-cart"></i>&nbsp;Carrinho</a>
                        </li>
                    </ul>&nbsp;&nbsp;
                    <div class="btn-group col-md-1">
                        <button class="btn dropdown-toggle btn-info" data-toggle="dropdown">
                            <i class="fa d-inline fa-lg fa-user-circle-o"></i> <?php
                            if (isset($_SESSION["nome"])) {
                                echo $_SESSION["nome"];
                            } else {
                                header("Location: ../../index.php");
                            }
                            ?> </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../control/controleLocadora.php?opcao=Logout">
                                <i class="fa d-inline fa-lg fa-sign-out"></i> Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 bg-gradient rounded">
                        <h1 class="">
                            <b>Filmes Disponíveis</b>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Gênero</th>
                                    <th>Preço</th>
                                    <th>Duração</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../control/controleLocadora.php';
                                $datar = mostrarFilmesNSelecionado($_SESSION["id_usuario"]);
                                if ($datar) :
                                    ?>
                                    <?php foreach ($datar as $data) : ?>
                                        <tr>
                                            <td><?php echo $data['nome']; ?></td>  
                                            <td><?php echo $data['genero']; ?></td>
                                            <td><?php echo "R$ ", str_replace(".", ",", $data['preco']); ?></td>
                                            <td><?php echo $data['duracao']; ?></td>
                                            <td class="actions text-right">   
                                                <a href="../control/controleLocadora.php?opcao=Selecionar&<?php
                                                echo 'idUsuario=', $_SESSION["id_usuario"], '&', 'idFilme=', $data['id'];
                                                ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-check"></i> Selecionar
                                                </a>
                                            </td>     
                                        </tr> <?php endforeach; ?>  <?php else : ?>
                                    <tr>  
                                        <td colspan="5">Nenhum registro encontrado.</td>
                                    </tr> <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../js/jquery-3.3.1.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
    </body>

</html>