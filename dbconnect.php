<?php

    //Conexão com o Banco de Dados
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'videoconferencia';

    $connect = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(mysqli_connect_error()){
        echo "Falha na conexão ".mysqli_connect_error();
    }