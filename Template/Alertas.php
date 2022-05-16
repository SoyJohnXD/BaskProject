<script>

<?php if($_SESSION['tipoResult']) { ?>
        function CargarAlerta() {
            <?php if($_SESSION['msjResult']!=null){ ?>
            swal("Buen Trabajo!", "<?= $_SESSION['msjResult']?>", "success");
            <?php $_SESSION['msjResult']= null;} ?>
        }
<?php } else { ?>
    function CargarAlerta() {
            <?php if($_SESSION['msjResult']!=null){?>
            swal("Algo salio mal!", "<?= $_SESSION['msjResult']?>", "error");
            <?php $_SESSION['msjResult']= null; }?>
        }
<?php } ?>
</script>