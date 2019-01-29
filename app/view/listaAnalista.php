<?php

    //Cabeçalho
    include_once '../../app/inc/topo.php';

    if ($usuarioAdm != 1) {
        echo "<h3 align='center'>VOCÊ NÃO TEM PERMISSÃO PARA ACESSA ESTA PÁGINA!</h3>";
    } else {

?>
<h3 class="light center-align">EDIÇÃO DE ANALISTAS</h3>
<hr><br><br>
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <table class="striped responsive-table centered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>LOGIN</th>
                            <th>SENHA</th>
                            <th>UNIDADE</th>
                            <th>ADMINISTRADOR</th>
                            <th>STATUS</th>
                            <th colspan="2">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                            $sqlAnalistas = "SELECT * FROM usuarios ORDER BY id"; 
                            $resultadoAnalistas = mysqli_query($connect, $sqlAnalistas);
                          
                            if (mysqli_num_rows($resultadoAnalistas) > 0) {

                                while($dadosAnalistas = mysqli_fetch_array($resultadoAnalistas)) {
                        ?>
                            <tr>
                                <td><?php echo $dadosAnalistas['id']; ?></td>
                                <td><?php echo $dadosAnalistas['nome'];?></td>
                                <td><?php echo $dadosAnalistas['login']; ?></td>
                                <td>******</td>
                                <td><?php echo $dadosAnalistas['unidade']; ?></td>
                                <?php
                                    if ($dadosAnalistas['adm'] == 1) {
                                        echo "<td style='color:green;'><b>SIM</b></td>";
                                    } else {
                                        echo "<td style='color:red;'><b>NÃO</b></td>";
                                    }

                                    if ($dadosAnalistas['ativo'] == 1) {
                                        echo "<td style='color:green;'><b>ATIVO</b></td>";
                                    } else {
                                        echo "<td style='color:red;'><b>BLOQUEADO</b></td>";
                                    }
                                ?>

                                <td>
                                    <a href="editaAnalista.php?id=<?php echo $dadosAnalistas['id']; ?>" class="btn-floating orange waves-effect waves-light"><i class="material-icons">edit</i></a>
                                    <a href="#modal<?php echo $dadosAnalistas['id']; ?>" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a>
                                </td>

                                <!-- Estrutura Modal para o Delete -->
                                <div id="modal<?php echo $dadosAnalistas['id']; ?>" class="modal">
                                    <div class="modal-content">
                                    <h4>Atenção!</h4>
                                    <p>Tem certeza que deseja excluir esse registro?</p>
                                    </div>
                                    <div class="modal-footer">

                                    <form action="deletaAnalista.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dadosAnalistas['id']; ?>">
                                        <button type="submit" name="btnDeletaAnalista" class="btn red";>SIM</button>
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
    </div>
    </div>
    </div>

    <?php
        }
        include_once '../../app/inc/rodape.php';
    ?>