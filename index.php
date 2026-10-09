<?php include 'header.php'; ?>
<div class="card">
    <h2>🥳 GETAFEST 🥳</h2>

    <form method="post" action="procesar.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre"> Nombre de usuario: </label>
            <input type="text" name="nombre" required placeholder="Ej. Ivan">
        </div>

        <div class="form-group">
                <label for="nombre"> Correo electronico </label>
                <input type="text" name="email" required placeholder="tunombre@correo.com">
        </div>

        <div class="form-group">
            <label for="edad"> Edad: </label>
            <input type="number" name="edad" min = "18" required placeholder="Ej. 54">
        </div>

        <div class="form-group">
            <label for="dias"> Tipo de entrada </label>
            <label><input type="radio" name="tipo_entrada" value="50">50€</label>
            <label><input type="radio" name="tipo_entrada" value="120">120€</label>
            <label><input type="radio" name="tipo_entrada" value="180">180€</label>
        </div>

        <div class="form-group">
            <label for="entrada"> Dias de asistencia (cada dia +10 €) </label>
            <label><input type="checkbox" name="dias[]" value="Viernes">Viernes</label>
            <label><input type="checkbox" name="dias[]" value="Sabado">Sabado</label>
            <label><input type="checkbox" name="dias[]" value="Domingo">Domingo</label>
        </div>

        <div class="form-group">
            <label for="pagos"> Metodo de pago </label>
            <select id="metodoPago" name = "metodoPago" required>
            <option value="">Selecciona una opcion</option>
                <option value="Tarjeta de credito">Tarjeta de credito</option>
                <option value="Bizum">Bizum</option>
                <option value="Paypal">Paypal</option>
            </select>
        </div>

        <h3>Acreditacion</h3>

        <div class="form-group">
            <label for="foto"> Selecciona una foto para la acreditacion: </label>
            <input type="file" id="foto" name="foto" required>
        </div>

        <h3>Observaciones</h3>

        <div class="form-group">
            <label for="observaciones">Comentarios o peticiones especiales: </label>
            <textarea id="observaciones" name="observaciones"></textarea>
        </div>

        <input type="submit" class="btn" value="Crear ficha" name="enviar">
    </form>
</div>