<?php
function isSesionStart()
{
    return isset($_SESSION['documento']);
}
function sesionValidate()
{
        if (!isSesionStart()) {
            header('Location: '.URL_PROY);
        }


}

?>