<?php
    //Mensagem de Erro ou Sucesso ao cadastrar
    if (isset($_SESSION['mensagem'])) { ?>
        <script>
        window.onload = function () {
            Swal.fire({
            type: 'success',
            title: 'Sucesso!',
            //footer: '<hr>',
            text: '<?php echo $_SESSION['mensagem'];?>',
            showConfirmButton: false,
            timer: 3000
            })
            //M.toast({html: '<?php /*echo $_SESSION['mensagem'];*/?>'})
        } 
        </script>
        
    <?php
        }
        unset($_SESSION['mensagem']);
    ?>