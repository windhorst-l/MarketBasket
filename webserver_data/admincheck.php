<?php
include 'sessioncheck.php';

if (!(in_array('dev', $_SESSION['permissions']) || in_array('admin', $_SESSION['permissions']))) {
    echo 'Zugriff verweigert. Du hast nicht die erforderliche Berechtigung, diese Seite zu sehen.';
    exit;
}

?>
