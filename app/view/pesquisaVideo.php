<?php
    //Cabeçalho
    include_once  '../../app/inc/topo.php';

    if ($usuarioAdm != 1) {
        echo "<h3 align='center'>VOCÊ NÃO TEM PERMISSÃO PARA ACESSA ESTA PÁGINA!</h3>";
    } else {

?>
<div class="row">
    <div class="col s12 m12">
        <h3 class="light center-align">PESQUISA DE VIDEOCONFERÊNCIAS</h3>
        <hr><br>
            <table id="pesquisa" class="striped responsive-table centered mdl-data-table"  style="width:100%">
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
                        $sqlVideo = "SELECT * FROM videoconferencias WHERE excluido = 0 ORDER BY dia, horainicio";
                    //    if ($dados['adm'] != 1) {
                    //        $sqlVideo = "SELECT * FROM videoconferencias WHERE dia = '$dataDoDia' AND excluido = 0  AND salasFisicas LIKE '%$usuarioUnidade%' ORDER BY dia, horainicio";
                    //     } else {
                    //       $sqlVideo = "SELECT * FROM videoconferencias WHERE dia >= '$dataDoDia' AND excluido = 0 ORDER BY dia, horaInicio";
                    //     }
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
    }
    //Rodapé
    include_once '../../app/inc/rodape.php';
?>