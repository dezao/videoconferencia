<?php
    //Topo
    require_once '../../app/inc/topo.php';

    if(isset($_POST['btnAtualizaAnalista'])) {
        
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = base64_encode(mysqli_escape_string($connect, $_POST['senha']));
        $unidade = mysqli_escape_string($connect, $_POST['unidade']);
        $adm = mysqli_escape_string($connect, $_POST['adm']);
        $ativo = mysqli_escape_string($connect, $_POST['ativo']);

        $id = mysqli_escape_string($connect, $_POST['id']);

        $sql = "UPDATE usuarios SET ativo='$ativo', adm='$adm', unidade='$unidade', nome='$nome', login='$login', senha='$senha' WHERE id='$id' ";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Analista atualizado com sucesso!';
            header('Location: ./../view/listaAnalista.php');
            Logger("Analista " . $login . " alterado por " . "[".$usuarioLogado."]");
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar os dados, tente novamente!';
            header('Location: ./../view/listaAnalista.php');
        }
    }

    include_once '../../app/inc/rodape.php';