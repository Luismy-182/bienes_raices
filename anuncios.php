<?php 
require_once __DIR__ .'/funciones/funciones.php';
incluirTemplate('header');
?>

    <main class="contenedor section">
        <h1>Casas y depas en venta</h1>


    <?php 
        $limite=6;
        include __DIR__.'/includes/templates/anuncios.php';
    ?>
    </div>

    </main>

    <?php incluirTemplate('footer'); ?>

</body>
</html>