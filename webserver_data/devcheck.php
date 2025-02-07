<?php
include 'sessioncheck.php';


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    echo 'Du musst eingeloggt sein, um auf diese Seite zuzugreifen.';
    exit;
}


if (!in_array('dev', $_SESSION['permissions'])) {
    echo 'Zugriff verweigert. Du hast nicht die erforderliche Berechtigung, diese Seite zu sehen.';
    exit;
}

?>
