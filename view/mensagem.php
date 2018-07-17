<?php
    
    //Mensagem de Erro ou Sucesso ao cadastrar
    if (isset($_SESSION['mensagem'])) { ?>
        <script>
        window.onload = function () {
            //swal("Good job!", "You clicked the button!", "success");
            M.toast({html: '<?php echo $_SESSION['mensagem'];?>'})
        } 
        </script>
        
    <?php
        }
        //session_unset($_SESSION['mensagem']);
        //session_destroy('mensagem');
        //session_unregister();
    ?>