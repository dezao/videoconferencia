<?php

    ///Definindo timezone do projeto
    date_default_timezone_set("America/Sao_Paulo");
    
    //Definindo localização
    setlocale(LC_TIME, 'portuguese');
    
    //Definind codificação
    //header('Content-Type: text/html; charset=iso-8859-1');
    
    //Definindo Data atual
    $dataDoDia = date('Y/m/d');

    //Sessão
    session_start();

    //Conexão com o Banco de Dados
    require_once '../../app/inc/dbconnect.php';

    //Verificação se Logado ou não 
   /*  if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    } */

    //Dados Usuários
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    $usuarioUnidade = $dados['unidade'];
    

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
            camada.innerHTML = hora + ":" + minuto;
            setTimeout("horas()",1000);
        }
    </script>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Atualização Automática da página a cada 60 segundos -->
    <meta http-equiv="refresh" content="60"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../../assets/css/customPainel.css">
    <title>Sistema de Videoconferência</title>
</head>
<body onload="horas()">


        <div class="row">
            <div class="col s12 m12">
            <id id="alerta"></div>
            <div class="card-panel #880e4f pink darken-4 white-text flow-text center-align s12"><img src="../../assets/img/logo_raizen.png"><h5>PAINEL DE VIDEOCONFERÊNCIAS</h5></div>
            <div id="data"> 
                <?php 
                    $date = date('Y-m-d');
                    echo strtoupper(strftime("%a | %d/%m", strtotime($date))); 
                ?> 
            </div>
            <div id="relogio"></div>
            
            <table class="responsive-table centered bordered">
                    <thead class="responsive-table centered #880e4f pink darken-4">
                        <tr>
                            <th hidden>ID</th>
                            <!-- <th class="flow-text">VIP</th> -->
                            <!-- <th class="flow-text">DATA</th> -->
                            <th class="flow-text">INÍCIO</th>
                            <th class="flow-text">FIM</th>
                            <!-- <th class="flow-text">PARTICIPANTES</th> -->
                            <th class="flow-text">TICKET</th>
                            <th class="flow-text">PIN</th>
<!--                             <th class="flow-text">UNIDADES</th> -->
                            <th class="flow-text">SALAS FÍSICAS</th>
<!--                            <th class="flow-text">OWNER</th>-->
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $dataDoDia = date("Y/m/d");
                            $sqlVideo = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND horaInicio > CURRENT_TIME() AND excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%' ORDER BY dia, horaInicio LIMIT 6"; 
                            $resultadoVideo = mysqli_query($connect, $sqlVideo);
                            mysqli_close($connect);

                            if (mysqli_num_rows($resultadoVideo) > 0) {

                                while($dadosVideo = mysqli_fetch_array($resultadoVideo)) {

                                    $vip = $dadosVideo['vip'];
                                    switch($vip) {
                                        case 'SIM' : $cor = '#fc4d4d'; $corFonte = '#fff'; break;
                                        case 'NÃO' : $cor = '';  $corFonte = '' ; break;
                                    }
                                    
                                    
                                    $inicio = date('H:i', strtotime('-15 minute', strtotime($dadosVideo['horaInicio'])));                                  
                                    if ($inicio === date('H:i')) {
                                        echo "<embed src='../../assets/wav/sweetalertsound.wav' width='1' height='1'>";
                                        echo '<div id="alertaVideo"><p align="center">A PRÓXIMA VIDEOCONFERÊNCIA COMEÇA EM 15 MINUTOS!</p></div>';                                        
                                    }
                        ?>
                            <tr style='background-color:<?php echo $cor;?>; color:<?php echo $corFonte;?>'>
                                <td hidden ><?php echo $dadosVideo['id']; ?></td>
                                <!-- <td class="flow-text"><?php /* echo $dadosVideo['vip']; */?></td> -->
                                    <?php $dia = $dadosVideo['dia']; 
                                        $dia = date('d/m', strtotime($dia));
                                    ?>
                               <!--  <b><td class="flow-text"><?php /* echo $dia; */ ?></td> -->
                                <td class="flow-text"><?php echo date('H:i', strtotime($dadosVideo['horaInicio'])); ?></td>
                                <td class="flow-text"><?php echo date('H:i', strtotime($dadosVideo['horaFim'])); ?></td></b>
                                <!-- <td class="flow-text"><?php  /* echo strtoupper($dadosVideo['nomeParticipantes']); */ ?></td> -->
                                <!-- <td class="flow-text"><?php /* echo $dadosVideo['unidadesParticipantes']; */ ?></td> -->
                                <td class="flow-text"><?php echo $dadosVideo['ticket']; ?></td>
                                <td class="flow-text"><?php echo $dadosVideo['pin']; ?></td>
<!--                                <td class="flow-text"><?php /*echo $dadosVideo['unidadesParticipantes'];*/ ?></td>-->
                                <td class="flow-text"><?php echo $dadosVideo['salasFisicas']; ?></td>
<!--                                <td class="flow-text"><?php /*echo $dadosVideo['analistaResponsavel'];*/ ?></td> -->

                            </tr>
                        <?php 
                        }  
                            } else { ?>
                                
                                <tr>
                                    <td colspan="12"><div class="card-panel red center-align s12 text-lighten-1"><span style="color: #fff;">NENHUM REGISTRO ENCONTRADO</span></div></td>
                                </tr>
                        <?php    }  
                        
                        ?>
                    </tbody>
                </table>
                <br>
                 
            </div>
        </div>

    <script type="text/javascript">
        setTimeout(function() {
        $('#alertaVideo').fadeOut('fast');
        }, 10000);
	</script>
<?php

    //Rodapé
    include_once '../../app/inc/rodape.php';

?>