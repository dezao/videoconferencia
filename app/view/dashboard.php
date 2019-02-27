<?php

    //Cabeçalho
    include_once  '../../app/inc/topo.php';
  
    //Total de Videoconferencias VIP
    if ($dados['adm'] != 1) {
       $sqlVideo2 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%'"; 
     } else {
       $sqlVideo2 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND excluido = 0"; 
     }
    //$sqlVideo2 = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%'"; 
    $resultadoVideo2 = mysqli_query($connect, $sqlVideo2);
    
   if (mysqli_num_rows($resultadoVideo2) >= 0) {
        $contVip = 0;  
        while($dadosVideo2 = mysqli_fetch_array($resultadoVideo2)) {   
            $vip2 = $dadosVideo2['vip'];     
            
            if($vip2 === 'SIM') {
                $contVip ++;
            }            
        }
    }

    //Total de Videoconferencias do dia (Incluí VIPS e normais)
    if ($dados['adm'] != 1) {
       $sqlVideo3 = "SELECT * FROM videoconferencias WHERE excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%'"; 
     } else {
       $sqlVideo3 = "SELECT * FROM videoconferencias WHERE excluido = 0"; 
     }
    //$sqlVideo3 = "SELECT * FROM videoconferencias WHERE excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%'"; 
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
     if ($dados['adm'] != 1) {
       $sqlVideo4 = "SELECT * FROM videoconferencias WHERE excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%'"; 
     } else {
       $sqlVideo4 = "SELECT * FROM videoconferencias WHERE excluido = 0";
     }
    //$sqlVideo4 = "SELECT * FROM videoconferencias WHERE excluido = 0 AND salasFisicas LIKE '%$usuarioUnidade%'"; 
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
                <h3 class="light center-align">DASHBOARD VIDEOCONFERÊNCIAS</h3>
                <hr> 
                     <section class="col s12 m6 l12 center-align">
                        <!--Videoconferências VIP-->
                        <article class="col s12 l6 xl4">
                            <div class="card red">
                                <div class="card-image">
                                    <i class="material-icons large center-align white-text">info_outline</i> 
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title white-text">VIPS</span>
                                    <?php
                                        if ($contVip == 0) { 
                                            echo "<p class='white-text'>Nenhuma videconferência para conectar!</p>";
                                        } else if ($contVip == 1) {
                                            echo "<p class='white-text'>Hoje teremos <b>$contVip videoconferência</b> para conectar!</p>";
                                        } else {
                                            echo "<p class='white-text'>Hoje teremos <b>$contVip videoconferências</b> para conectar!</p>";
                                        }
                                    ?> 
                                    </div>
                            </div>        
                        </article>  
                     <!--Videoconferências do Dia-->
                        <article class="col s12 l6 xl4">
                            <div class="card blue">
                                <div class="card-image">
                                    <i class="material-icons large center-align white-text">videocam</i>
                                </div>
                                <div class="card-content">
                                    <span class="card-title white-text">HOJE</span>
                                    <?php
                                        if ($contVideosDoDia == 0) { 
                                            echo "<p class='white-text'>Nenhuma videconferência para conectar!</p>";
                                        } else if ($contVideosDoDia == 1) {
                                            echo "<p class='white-text'>Hoje teremos <b>$contVideosDoDia videoconferência</b> para conectar!</p>";
                                        } else {
                                            echo "<p class='white-text'>Hoje teremos <b>$contVideosDoDia videoconferências</b> para conectar!</p>";
                                        }
                                    ?> 
                                </div>
                            </div>        
                        </article>
                        <!--Videoconferências de amanhã-->
                        <article class="col s12 l6 xl4">
                            <div class="card green">
                                <div class="card-image">
                                <i class="material-icons large center-align white-text">ondemand_video</i> 
                                </div>
                                <div class="card-content">
                                    <span class="card-title white-text">AMANHÃ</span>
                                    <?php
                                        if ($contVideosDoProximoDia == 0) { 
                                            echo "<p class='white-text'>Nenhuma videconferência para conectar!</p>";
                                        } else if ($contVideosDoProximoDia == 1) {
                                            echo "<p class='white-text'>Amanhã teremos <b>$contVideosDoProximoDia videoconferência</b> para conectar</p>";
                                        } else {
                                            echo "<p class='white-text'>Amanhã teremos <b>$contVideosDoProximoDia videoconferências</b> para conectar</p>";
                                        }
                                    ?> 
                                </div>
                            </div>        
                        </article>
                    </section>
                <!-- <table id="dashboard" class="mdl-data-table" style="width:100%"> -->
                <table id="dashboard" class="striped responsive-table centered resultado mdl-data-table"  style="width:100%">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>TICKET</th>
                            <th>DATA</th>
                            <th>INICIO</th>
                            <th>FIM</th>
                            <th>PIN</th>
                            <th>SALAS FÍSICAS</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                           $dataDoDia = date("Y/m/d");
                           if ($dados['adm'] != 1) {
                               $sqlVideo = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND excluido = 0  AND salasFisicas LIKE '%$usuarioUnidade%' ORDER BY dia, horainicio";
                            } else {
                              $sqlVideo = "SELECT * FROM videoconferencias WHERE dia >= '$dataDoDia' AND excluido = 0 ORDER BY dia, horaInicio";
                            }
                           //$sqlVideo = "SELECT * FROM videoconferencias WHERE dia >= '$dataDoDia' AND excluido = 0  AND salasFisicas LIKE '%$usuarioUnidade%' ORDER BY dia, horainicio";
                           //$sqlVideo = "SELECT * FROM videoconferencias WHERE dia >= '$dataDoDia' AND excluido = 0  ORDER BY dia, horaInicio";
                           //$sqlVideo = "SELECT * FROM videoconferencias ORDER BY dia, horaInicio"; 
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
                        <tr class="resultado" style='background-color:<?php echo $cor;?>; color:<?php echo $corFonte;?>'>                                
                            <td hidden ><?php echo $dadosVideo['id']; ?></td>
                            <td><?php echo $dadosVideo['ticket']; ?></td>
                                <?php $dia = $dadosVideo['dia']; 
                                    $dia = date('d/m/Y', strtotime($dia));
                                ?>
                            <td><?php echo $dia ?></td>
                            <td><?php echo $dadosVideo['horaInicio']; ?></td>
                            <td><?php echo $dadosVideo['horaFim']; ?></td>
                            <td><b><?php echo $dadosVideo['pin']; ?></b></td>
                            <td><?php echo $dadosVideo['salasFisicas']; ?></td>
                            <td>
                                <a href="editaVideo.php?id=<?php echo $dadosVideo['id']; ?>" class="btn-floating orange waves-effect waves-light"><i class="material-icons">edit</i></a>
                                <a href="#modal<?php echo $dadosVideo['id']; ?>" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a>
                            </td>

                            <!-- Estrutura Modal para exclusão -->
                            <div id="modal<?php echo $dadosVideo['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Atenção!</h4>
                                    <p>Tem certeza que deseja excluir esse registro?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="deletaVideo.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dadosVideo['id']; ?>">
                                        <button type="submit" name="btnDeletar" class="btn red">SIM</button>
                                    </form>
                                    <a href="#!" class="modal-close waves-effect waves-green green white-text btn-flat">NÃO</a>
                                </div>
                            </div>
                        </tr>
                        <?php 
                        }  
                            } else { ?>
                                
                                <tr>
                                    <td colspan="12"><div class="card-panel red center-align s12 text-lighten-1"><span style="color: #fff;">NENHUM REGISTRO ENCONTRADO</span></div></td>
                                </tr>
                        <?php    }  ?>
                    </tbody>
                </table>
                <br>
            </div>
        </div>

<?php
    //Rodapé
    include_once '../../app/inc/rodape.php';
?>