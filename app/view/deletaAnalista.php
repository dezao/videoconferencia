<?php

    //Cabeçalho
    include_once '../../app/inc/topo.php';
    
    //Query para mostrar o campo usuário no log
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    $login = $dados['login'];

    if(isset($_POST['btnDeletaAnalista'])) {

        $id = mysqli_escape_string($connect, $_POST['id']);

        $sql = "DELETE FROM usuarios WHERE id = '$id'";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Analista deletado com sucesso!';
            Logger("Analista " . $login .' - '. " deletado por " .'['. $usuarioLogado.']');
            header('Location: ./listaAnalista.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao deletar o analista, tente novamente!';
            header('Location: ./listaAnalista.php');
        }
    }

    include_once '../../app/inc/rodape.php';
    
 ?>