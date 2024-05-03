<?php
    include 'inc/functions.php';
    headerTemp();

    if (!isset($_GET['id'])) {
        // Em desenvolvimento
    } else {
        $id = $_GET['id'];
        getFicha($id);
    }

    footerTemp();
?>