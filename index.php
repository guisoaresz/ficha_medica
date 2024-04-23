<?php
    include 'inc/functions.php';

    headerTemp();

    if (!isset($_GET['id'])) {
?>
    <div class="menu">
        <form action="" method="post">
            <h1>Ficha Médica</h1>
            <input type="text" name="txtNome" id="txtNome" placeholder="Nome do paciente"><br>
            <button type="submit">Buscar</button>
        </form>
    </div>
<?php        
    } else {
        $id = $_GET['id'];
        getFicha($id);
    }

    footerTemp();
?>