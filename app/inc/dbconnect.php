<?php

    //Conexão com o Banco de Dados
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'dEzao@123';
    $banco = 'videoconferencia';

    $connect = mysqli_connect($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($connect, "utf8");

    if(mysqli_connect_error()){
        echo "Falha na conexão ".mysqli_connect_error();
    }