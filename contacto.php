<?php 
require_once __DIR__ .'/funciones/funciones.php';
incluirTemplate('header');
?>

    <main class="contenedor section">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">            
            <source srcset="build/img/destacada3.jpg" type="image/jpg">            
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen destacada">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">

                <label for="email">Email</label>
                <input type="email" name="email" id="email">

                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" ></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre propiedad</legend>
                <label for="venta">Vende o compra</label>

                <select name="venta" id="venta">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="vende">Vende</option>
                    <option value="compra">Compra</option>
                </select>

                <label for="cantidad">Precio o presupuesto</label>
                <input type="number" placeholder="Cantidad" placeholder="Tu presupuesto">



            </fieldset>



            <fieldset>
                <legend>Contacto</legend>

                <legend>Como deseas ser contactado</legend>
                <div class="forma-contacto">
                    <input type="radio" id="r_telefono" value="telefono" name="contacto">
                    <label for="r_telefono">Teléfono</label>
                    <input type="radio" id="r_email" value="email" name="contacto">
                    <label for="r_email">Email</label>
                </div>
            <p>Si eligio teléfono elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" min="9:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php incluirTemplate('footer'); ?>
</body>
</html>