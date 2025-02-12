<?php 
require_once __DIR__ .'/funciones/funciones.php';
incluirTemplate('header');
?>
    <main class="contenedor section contenido-centrado">
        <h1>Guía para decoración de tu hogar.</h1>
       
        <picture>
                <source srcset="build/img/destacada2.webp" type="image/webp">
                <source srcset="build/img/destacada2.jpg" type="image/jpg">
                <img loading="lazy" src="/build/img/destacada2.jpg" alt="imagen anuncio">
        </picture>

            <div class="resumen-propiedad">
                
                    <p class="informacion-meta">Escrito el <span>17/12/2012</span> por <span>Admin</span></p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam perferendis qui nesciunt veritatis. Inventore neque, tempora alias, reiciendis laudantium voluptatem distinctio nulla rerum molestiae at quam eaque fuga ex reprehenderit.</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam perferendis qui nesciunt veritatis. Inventore neque, tempora alias, reiciendis laudantium voluptatem distinctio nulla rerum molestiae at quam eaque fuga ex reprehenderit.</p>
            </div>
    </main>

    <?php incluirTemplate('footer'); ?>

</body>
</html>