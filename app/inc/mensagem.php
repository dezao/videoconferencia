<?php
    //Mensagem de Erro ou Sucesso ao cadastrar / deletar

    if (isset($_SESSION['mensagem'])) { ?>
        <script>
            window.onload = function () {
                // Swal.fire({
                //     type: 'success',
                //     //title: 'Sucesso!',
                //     text: '',
                //     showConfirmButton: false,
                //     timer: 3000,
                // });
                M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
            } 
        </script>
        
    <?php
        }
        unset($_SESSION['mensagem']);
    ?>