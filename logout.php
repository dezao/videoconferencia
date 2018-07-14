<?php
    //Encerramento da Sessão
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
