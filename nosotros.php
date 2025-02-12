<?php 
require_once __DIR__ .'/funciones/funciones.php';
incluirTemplate('header');
?>
    <main class="contenedor section">
        <h1>Conoce sobre nosotros</h1>

        <div class="nosotros">
            <div class="imagen-nosotros">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpeg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="imagen nosotros">
                </picture>
            </div>

            <div class="parrafo-nosotros">
                <blockquote>25 años de experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nihil tempore non veniam tenetur fugiat rem modi necessitatibus in eaque. Hic, nam explicabo quod expedita reprehenderit blanditiis ad. Harum, provident.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quisquam doloremque vel debitis, exercitationem ab quia quam quae optio amet consequatur et culpa dolorem, vitae est eveniet aut id ipsa!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nihil tempore non veniam tenetur fugiat rem modi necessitatibus in eaque. Hic, nam explicabo quod expedita reprehenderit blanditiis ad. Harum, provident.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quisquam doloremque vel debitis, exercitationem ab quia quam quae optio amet consequatur et culpa dolorem, vitae est eveniet aut id ipsa!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla nihil tempore non veniam tenetur fugiat rem modi necessitatibus in eaque. Hic, nam explicabo quod expedita reprehenderit blanditiis ad. Harum, provident.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quisquam doloremque vel debitis, exercitationem ab quia quam quae optio amet consequatur et culpa dolorem, vitae est eveniet aut id ipsa!
                </p>
            </div>
        </div>


        <section>
        <h2>Más sobre nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img  loading="lazy" src="build/img/icono1.svg" alt="imagen icono1">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, voluptate tempore ad ea ipsum sapiente qui iste! </p>
            </div>
            <div class="icono">
                <img loading="lazy" src="build/img/icono2.svg" alt="imagen icono1">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, voluptate tempore ad ea ipsum sapiente qui iste! </p>
            </div>
            <div class="icono">
                <img loading="lazy" src="build/img/icono3.svg" alt="imagen icono1">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, voluptate tempore ad ea ipsum sapiente qui iste! </p>
            </div>
        </div>
        </section>
    </main>

    <?php incluirTemplate('footer'); ?>

</body>
</html>