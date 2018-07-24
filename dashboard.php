<?php

    //Cabeçalho
    include_once './view/topo.php';

    include_once './view/mensagem.php';

    $dataDoDia = date('Y/m/d');
    
    //Total de Videoconferencias VIP
    $sqlVideo2 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' ORDER BY dia, horaInicio"; 
    $resultadoVideo2 = mysqli_query($connect, $sqlVideo2);

   if (mysqli_num_rows($resultadoVideo2) > 0) {
        $contVip = 0;  
        while($dadosVideo2 = mysqli_fetch_array($resultadoVideo2)) {   
            $vip2 = $dadosVideo2['vip'];     
            if($vip2 === 'SIM') {
                $contVip ++;
            }            
    }
}

    //Total de Videoconferencias do dia
    $sqlVideo3 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' ORDER BY dia, horaInicio"; 
    $resultadoVideo3 = mysqli_query($connect, $sqlVideo3);

   if (mysqli_num_rows($resultadoVideo3) > 0) {

        $contVideosDoDia = 0;  

        while($dadosVideo3 = mysqli_fetch_array($resultadoVideo3)) {   
            
            $videosDoDia = $dadosVideo3['dia'];

            $videosDoDia = date('Y/m/d', strtotime($videosDoDia));
            
            if($videosDoDia === $dataDoDia) {
                $contVideosDoDia ++;
            }       
        }           
    }

    //Total de Videoconferências do próximo dia
    $dataDoDia = date('Y/m/d', strtotime($dataDoDia . '+ 1 days'));
    $sqlVideo4 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' ORDER BY dia, horaInicio"; 
    $resultadoVideo4 = mysqli_query($connect, $sqlVideo4);

   if (mysqli_num_rows($resultadoVideo4) > 0) {

        $contVideosDoProximoDia = 0;  

        while($dadosVideo3 = mysqli_fetch_array($resultadoVideo4)) {   
            
            $videosDoProximoDia = $dadosVideo3['dia'];

            $videosDoProximoDia = date('Y/m/d', strtotime($videosDoProximoDia));
            
            if($videosDoProximoDia === $dataDoDia) {
                $contVideosDoProximoDia ++;
            }          
        }           
    }
    
?>

        <div class="row">
            <div class="col s12 m12">
                <!--<p class="center-align"><b>BEM VINDO AO SISTEMA DE VIDEOCONFERÊNCIAS <?php echo strtoupper($dados['nome']); ?>!</b></p>-->
                <h3 class="light center-align">DASHBOARD VIDEOCONFERÊNCIAS</h3>
                <hr> 
                     <section class="col s12 m6 l12 center-align">
                        <!--Card1-->
                        <article class="col s12 l6 xl4">
                            <div class="card blue">
                                <div class="card-image">
                                    <i class="material-icons large center-align white-text">videocam</i>
                                </div>
                                <div class="card-content">
                                    <span class="card-title white-text">HOJE</span>
                                    <p class="white-text">Hoje teremos <b>
                                    <?php
                                        if (isset($contVideosDoDia)) {
                                            echo $contVideosDoDia;
                                        } else {
                                            echo "0";
                                        }
                                        ?> videoconferências</b> para conectar!</p>
                                </div>
                            </div>        
                        </article>
                        
                        <!--Card2-->
                        <article class="col s12 l6 xl4">
                            <div class="card green">
                                <div class="card-image">
                                <i class="material-icons large center-align white-text">ondemand_video</i> 
                                </div>
                                <div class="card-content">
                                    <span class="card-title white-text">AMANHÃ</span>
                                    <p class="white-text">Amanhã teremos <b>
                                    <?php
                                        if (isset($contVideosDoProximoDia)) {
                                            echo $contVideosDoProximoDia;
                                        } else {
                                            echo "0";
                                        }
                                    ?> videoconferências</b> para conectar!</p>
                                </div>
                            </div>        
                        </article>
                        
                        <!--Card3-->
                        <article class="col s12 l6 xl4">
                            <div class="card red">
                                <div class="card-image">
                                    <i class="material-icons large center-align white-text">info_outline</i> 
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title white-text">VIPS</span>
                                        <p class="white-text">Hoje teremos <b>
                                        <?php
                                        if (isset($contVip)) {
                                            echo $contVip;
                                        } else {
                                            echo "0";
                                        }
                                        ?> videoconferências</b> VIPS para conectar!</p>
                                    </div>
                            </div>        
                        </article>  

                    </section>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>VIP</th>
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

                                    //Destacar as videoconferencias VIP
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
                                <td clas="exibe"><?php echo $dia ?></td>
                                <td clas="exibe"><?php echo $dadosVideo['horaInicio']; ?></td>
                                <td clas="exibe"><?php echo $dadosVideo['horaFim']; ?></td>
                                <td clas="exibe"><?php echo $dadosVideo['nomeParticipantes']; ?></td>
                                <td clas="exibe"><?php echo $dadosVideo['unidadesParticipantes']; ?></td>
                                <td clas="exibe"><?php echo $dadosVideo['salasFisicas']; ?></td>
                                <td clas="exibe"><b><?php echo $dadosVideo['pin']; ?></b></td>
                                
                                <td><a href="editaVideo.php?id=<?php echo $dadosVideo['id']; ?>" class="btn-floating orange waves-effect waves-light"><i class="material-icons">edit</i></a></td>
                                <td><a href="#modal<?php echo $dadosVideo['id']; ?>" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a></td>

                                <!-- Modal Structure -->
                                <div id="modal<?php echo $dadosVideo['id']; ?>" class="modal">
                                    <div class="modal-content">
                                    <h4>Atenção!</h4>
                                    <p>Tem certeza que deseja excluir esse registro?</p>
                                    </div>
                                    <div class="modal-footer">

                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dadosVideo['id']; ?>">
                                        <button type="submit" name="btnDeletar" class="btn red";>SIM</button>
                                    </form>
                                    <a href="#!" class="modal-close waves-effect waves-green green white-text btn-flat">NÃO</a>
                                    </div>
                                </div>
                            </tr>
                        <?php 
                        }  

                            } else { ?>
                                
                                <tr>
                                    <td colspan="12"><div class="card-panel red center-align s12">NENHUM REGISTRO ENCONTRADO</div></td>
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