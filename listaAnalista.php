<?php

    //Cabeçalho
    include_once './view/topo.php';

    include_once './view/mensagem.php';

?>
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
                            <th>ADMINISTRADOR?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           
                            $sqlAnalistas = "SELECT * FROM usuarios ORDER BY id"; 
                            $resultadoAnalistas = mysqli_query($connect, $sqlAnalistas);
                            //mysqli_close($connect);

                            if (mysqli_num_rows($resultadoAnalistas) > 0) {

                                while($dadosAnalistas = mysqli_fetch_array($resultadoAnalistas)) {

                                   //Destacar usuários ADM
                                    $adm = $dadosAnalistas['adm'];
                                    switch($adm) {
                                        case '1' : $cor = 'red'; $corFonte = '#fff'; break;
                                        case '0' : $cor = '';  $corFonte = '' ; break;
                                    }

                        ?>
                            <tr style='background-color:<?php echo $cor;?>; color:<?php echo $corFonte;?>'>
                                <td><?php echo $dadosAnalistas['id']; ?></td>
                                <td><?php echo $dadosAnalistas['nome'];?></td>
                                <td><?php echo $dadosAnalistas['login']; ?></td>
                                <td>******</td>
                                <?php
                                    if($dadosAnalistas['adm'] == 1) {
                                        echo '<td>SIM</td>';
                                    } else {
                                        echo '<td>NÃO</td>';
                                    }
                                ?>
                                <td><a href="editaAnalista.php?id=<?php echo $dadosAnalistas['id']; ?>" class="btn-floating orange waves-effect waves-light"><i class="material-icons">edit</i></a></td>
                                <td><a href="#modal<?php echo $dadosAnalistas['id']; ?>" class="btn-floating red modal-trigger waves-effect waves-light"><i class="material-icons">delete</i></a></td>

                                <!-- Modal Structure -->
                                <div id="modal<?php echo $dadosAnalistas['id']; ?>" class="modal">
                                    <div class="modal-content">
                                    <h4>Atenção!</h4>
                                    <p>Tem certeza que deseja excluir esse registro?</p>
                                    </div>
                                    <div class="modal-footer">

                                    <form action="deleteAnalista.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dadosAnalistas['id']; ?>">
                                        <button type="submit" name="btnDeletarAnalista" class="btn red";>SIM</button>
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