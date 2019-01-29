<?php
    //Mensagem de Erro ou Sucesso ao cadastrar
    if (isset($_SESSION['mensagem'])) { ?>
        <script>
        window.onload = function () {
            M.toast({html: '<?php echo $_SESSION['mensagem'];?>'})
        } 
        </script>
        
    <?php
        }
        unset($_SESSION['mensagem']);
    ?>