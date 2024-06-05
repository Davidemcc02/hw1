


<?php
//<!-- Pagina per logout utenti -->
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
exit;
?>
