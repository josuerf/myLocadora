<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../css/geral.css" type="text/css"> 
        <title>FilmeAR</title>
        <?php
        session_start();
        if ($_SESSION["tipo_usuario"] === 'cliente') {
            header("Location: principal_cliente.php");
        } elseif (!isset($_SESSION["tipo_usuario"])) {
            header("Location: ../../index.php");
        }
        ?>
    </head>


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
                        <li class="nav-item">
                            <a class="nav-link active" href="principal_func.php">
                                <i class="fa d-inline fa-film fa-lg"></i>&nbsp;Filmes</a>
                        </li>
                        <li class="nav-item bg-primary">
                            <a class="nav-link active" href="#">
                                <i class="fa d-inline fa-lg fa-file-video-o"></i>&nbsp;Cadastrar</a>
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
                    <div class="col-md-12 bg-gradient">
                        <h1 class="">
                            <b>Cadastrar Filme</b>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 my-1 p-1">
                        <form class="mx-0 px-1" method="POST" action="../control/controleLocadora.php">
                            <div class="form-group">
                                <label for="nomeFilme">Nome</label>
                                <input type="text" class="form-control" maxlength="30" placeholder="Digite o Nome do Filme" id="nomeFilme" name="nomeFilme" required="required"> </div>
                            <div class="form-group">
                                <label for="genero">Gênero</label>
                                <select class="custom-control custom-select" id="genero" name="genero">
                                    <option value="Ação">Ação</option>
                                    <option value="Terror">Terror</option>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Comédia">Cómedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control preco" id="preco" placeholder="R$ 0.00" name="preco" required> </div>
                            <div class="form-group">
                                <label for="duracao">Duração</label>
                                <input type="text" class="form-control duracao" id="duracao" placeholder="00:00h" required name="duracao"> </div>
                            <button type="submit" name="opcao" value="CadastrarFilme" class="btn btn-success" data-txtBody="Filme Cadastrador com Sucesso!" 
                                    data-txtTitle="Filme Cadastrado" data-toggle="modal" data-target="#modalSuccess" data-url="../view/principal_func.php">
                                <i class="fa d-inline fa-lg fa-envelope"></i> Cadastrar
                                <br> </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php include_once "../util/modalSuccess.php"; ?>
        </div>
        <script src="../../js/jquery-3.3.1.min.js"></script>
        <script src="../../js/popper.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/jquery.maskedinputs.js" type="text/javascript"></script>
        <script src="../../js/mascaras.js" type="text/javascript"></script> 
    </body>

</html>