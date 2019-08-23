<?php
//É necessário fazer a conexão com o Banco de Dados
require_once "configDB.php";

function verificar_entrada($entrada)
{
    $saida = trim($entrada); //Remove espaços antes e depois
    $saida = stripslashes($saida);
    $saida = htmlspecialchars($saida);
    return $saida;
}


if (
    isset($_POST['action']) &&
    $_POST['action'] == 'cadastro'
) {
    echo "<h1>Dados enviados</h1>";
    $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
    $nomeUsuario = verificar_entrada($_POST['nomeUsuário']);
    $emailUsuario = verificar_entrada($_POST['emailUsuário']);
    $senhaUsuario = verificar_entrada($_POST['senhaConfirma']);
    $senhaConfirma = verificar_entrada($_POST['senhaConfirma']);
    $concordar = $_POST['concordar'];
    $dataCriacao = date("Y-m-d H:i:s");

    $senha = sha1($senhaUsuario);
    $senhaC = sha1($senhaConfirma);
    echo "<h5>Nome completo: $nomeCompleto</h5>";
    echo "<h5>Nome Usuário: $nomeUsuario</h5>";
    echo "<h5>Email Usuário: $emailUsuario</h5>";
    echo "<h5>Senha Usuário: $senhaUsuario</h5>";
    echo "<h5>Senha Confirma: $senhaConfirma</h5>";
    echo "<h5>concordar: $concordar</h5>";
    echo "<h5>Data de Criação: $dataCriacao</h5>";

    if($senha != $senhaC){
        echo "<h1>As senhas não conferem</h1>";
        exit();
    }else{
        echo "<h5>Senha Codificada: $senha</h5>";
    }

} else {
    echo "<h1 style='color:red'>Esta página nõ pode
    ser acessada diretamente</h1>";
}
