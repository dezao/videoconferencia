<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    //Verificação 
    if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    }

    //Dados
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);

?>

    <script>
        function horas() {
            camada = document.getElementById('relogio');
            hoje = new Date();
            hora = hoje.getHours();
            if(hora<=9){
                hora = "0" + hora;
            }
            minuto = hoje.getMinutes();
            if(minuto<=9) {
                minuto = "0" + minuto;
            }
            segundo = hoje.getSeconds();
            if(segundo<=9) {
                segundo = "0" + segundo;
            }
            camada.innerHTML = hora + ":" + minuto + ":" + segundo;
            setTimeout("horas()",1000);
        }
    </script>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="60" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/customPainel.css">
    <title>Sistema de Videoconferência</title>
</head>
<body onload="horas()">


        <div class="row">
            <div class="col s12 m12">
            <div class="card-panel #880e4f pink darken-4 white-text flow-text center-align s12"><img src="./img/logo_raizen.png"><h5>PAINEL DE VIDEOCONFERÊNCIAS</h5></div>
            <div id="relogio"></div>
            <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>VIP</th>
                            <th>TICKET</th>
                            <th>DATA</th>
                            <th>INÍCIO</th>
                            <th>FIM</th>
                            <th>PARTICIPANTES</th>
                            <th>UNIDADES</th>
                            <th>SALAS FÍSICAS</th>
                            <th>PIN</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $dataDoDia = date("Y/m/d");
                            $sqlVideo = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND horaInicio > NOW() ORDER BY dia, horaInicio"; 
                            $resultadoVideo = mysqli_query($connect, $sqlVideo);
                            mysqli_close($connect);

                            if (mysqli_num_rows($resultadoVideo) > 0) {

                                while($dadosVideo = mysqli_fetch_array($resultadoVideo)) {

                                    $vip = $dadosVideo['vip'];

                                    switch($vip) {
                                        case 'SIM' : $cor = 'red'; $corFonte = '#fff'; break;
                                        case 'NÃO' : $cor = '';  $corFonte = '' ; break;
                                    }
                                    
                        ?>
                            <tr style='background-color:<?php echo $cor;?>; color:<?php echo $corFonte;?>'>
                                <td hidden ><?php echo $dadosVideo['id']; ?></td>
                                <td><?php echo $dadosVideo['vip'];?></td>
                                <td><?php echo $dadosVideo['ticket']; ?></td>
                                    <?php $dia = $dadosVideo['dia']; 
                                        $dia = date('d/m/Y', strtotime($dia));
                                    ?>
                                <td><?php echo $dia; ?></td>
                                <td><?php echo $dadosVideo['horaInicio']; ?></td>
                                <td><?php echo $dadosVideo['horaFim']; ?></td>
                                <td><?php echo $dadosVideo['nomeParticipantes']; ?></td>
                                <td><?php echo $dadosVideo['unidadesParticipantes']; ?></td>
                                <td><?php echo $dadosVideo['salasFisicas']; ?></td>
                                <td><?php echo $dadosVideo['pin']; ?></td>

                            </tr>
                        <?php 
                        }  
                            } else { ?>
                                
                                <tr>
                                <td colspan="12"><div class="card-panel red center-align s12 text-lighten-1">NENHUM REGISTRO ENCONTRADO</div></td>
                                </tr>
                        <?php    }  ?>
                    </tbody>
                </table>
                <br>
                 
            </div>
        </div>


<?php

    //Rodapé
    include_once './view/rodape.php';

?>