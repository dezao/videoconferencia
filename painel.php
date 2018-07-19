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

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/custom.css">
    <title>Sistema de Videoconferência</title>
</head>
<body>


        <div class="row">
            <div class="col s12 m12">
            <div class="card-panel #880e4f pink darken-4 white-text flow-text center-align s12"><h5>PAINEL DE VIDEOCONFERÊNCIAS</h5></div>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>Ticket</th>
                            <th>Data</th>
                            <th>Hora Inicial</th>
                            <th>Hora Final</th>
                            <th>Participantes</th>
                            <th>Unidades</th>
                            <th>Salas Físicas</th>
                            <th>PIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $sqlVideo = "SELECT * FROM videoconferencias ORDER BY dia, horaInicio"; 
                            $resultadoVideo = mysqli_query($connect, $sqlVideo);
                            mysqli_close($connect);

                            if (mysqli_num_rows($resultadoVideo) > 0) {

                                while($dadosVideo = mysqli_fetch_array($resultadoVideo)) {

                        ?>
                            <tr>
                                <td hidden ><?php echo $dadosVideo['id']; ?></td>
                                <td><?php echo $dadosVideo['ticket']; ?></td>
                                    <?php $dia = $dadosVideo['dia']; 
                                        $dia = date('d/m/Y', strtotime($dia));
                                    ?>
                                <td><?php echo $dia ?></td>
                                <td><?php echo $dadosVideo['horaInicio']; ?></td>
                                <td><?php echo $dadosVideo['horaFim']; ?></td>
                                <td><?php echo $dadosVideo['nomeParticipantes']; ?></td>
                                <td><?php echo $dadosVideo['unidadesParticipantes']; ?></td>
                                <td><?php echo $dadosVideo['salasFisicas']; ?></td>
                                <td><b><?php echo $dadosVideo['pin']; ?></b></td>
                                
                            </tr>
                        <?php 
                        }  
                            } else { ?>
                                
                                <tr>
                                    <td colspan="8"><div class="card-panel red center-align s12">NENHUM REGISTRO ENCONTRADO</div></td>
                                </tr>
                        <?php    }  ?>
                    </tbody>
                </table>
                <br>
                 
            </div>
        </div>


    <center>
        
    </center>


<?php

    //Rodapé
    include_once './view/rodape.php';

?>