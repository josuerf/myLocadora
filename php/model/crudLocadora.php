<?php

include 'conexaoDB.php';

function autentica($usuario, $senha) {
    conectar();
    $res = query("select * from usuario where nome = '$usuario' and senha = unhex('$senha')");
    $dataArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $dataArray[] = $row;
    }
    fechar();
    return $dataArray;
}

function cadastrarUsuario($nome, $senha, $email, $tipo) {
    conectar();
    $encryptd = sha1($senha);
    query("insert into usuario (nome,email,tipo_usuario,senha) values ('$nome','$email','$tipo',unhex('$encryptd'))");
    fechar();
}

function mostrarFilmesSelecionados($usuario) {
    conectar();
    $res = query("select p.* from filme p inner join compra v on p.id = v.id_filme where v.id_usuario = '$usuario'");
    $dataArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $dataArray[] = $row;
    }
    fechar();
    return $dataArray;
}

function visualizarTodosFilmes() {
    conectar();
    $res = query("select * from filme");
    $dataArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $dataArray[] = $row;
    }
    fechar();
    return $dataArray;
}

function mostrarFilmesNSelecionados($usuario) {
    conectar();
    $res = query("select * from filme where id not in (select p.id from filme p inner join compra v on p.id = v.id_filme where v.id_usuario = '$usuario') ");
    $dataArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $dataArray[] = $row;
    }
    fechar();
    return $dataArray;
}

function excluirFilme($idFilme) {
    conectar();
    query("delete from filme where id = $idFilme");
    fechar();
}

function atualizaFilme($idFilme, $nome, $genero, $preco, $duracao) {
    conectar();
    query("update filme set nome = '$nome',genero = '$genero', preco = $preco, duracao = '$duracao' where id = $idFilme");
    fechar();
}

function cadastrarFilme($nome, $genero, $preco, $duracao) {
    conectar();
    query("insert into filme (nome,genero,preco,duracao) values ('$nome','$genero',$preco,'$duracao')");
    fechar();
}
function comprarFilme($idUsuario,$idFilme){
    conectar();
    query("insert into compra (id_usuario,id_filme) values ($idUsuario,$idFilme)");
    fechar();
}
function removerSelecionado($idUsuario, $idFilme){
    conectar();
    query("delete from compra where id_usuario = $idUsuario and id_filme = $idFilme");
    fechar();
}
function mostrarFilmePorChave($nome){
    conectar();
    $res = query("select * from filme where nome like '%$nome%'");
    $dataArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $dataArray[] = $row;
    }
    fechar();
    return $dataArray;
}
function buscaNomeUsuario($nome,$email){
    conectar();
    $res = query("select * from usuario where nome = '$nome' or email='$email'");
    $dataArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $dataArray[] = $row;
    }
    fechar();
    return $dataArray;
}
?>