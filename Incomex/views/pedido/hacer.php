<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
    </p>
    <br/>
    <?php
        // Hacer una solicitud GET a la API de provincias
        $apiUrl = 'http://localhost:4000/provincias';
        $response = file_get_contents($apiUrl);
        $provincias = json_decode($response);

        // Verificar si la solicitud tuvo éxito
        if ($provincias === null) {
            echo "Error al obtener las provincias desde la API.";
            exit;
        }
    ?>

    
    <h3>Dirección para el envío:</h3>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="provincia">Provincia</label>
        <select name="provincia" id="provinciaSelect" required>
            <!-- Agrega una opción vacía al principio -->
            <option value="">Selecciona una provincia</option>
            <?php foreach ($provincias as $provincia): ?>
                <option value="<?= $provincia ?>"><?= $provincia ?></option>
            <?php endforeach; ?>
        </select>

        <label for="ciudad">Ciudad</label>
        <select name="localidad" id="ciudadSelect" required>
            <!-- Las opciones se llenarán dinámicamente usando JavaScript -->
        </select>
        
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required/>
        
        <input type="submit" value="Confirmar pedido"/>
    </form>

    <script>
        document.getElementById('provinciaSelect').addEventListener('change', function() {
            var selectedProvincia = this.value;
            var apiUrl = 'http://localhost:4000/provincias/' + encodeURIComponent(selectedProvincia);
            
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    var ciudadSelect = document.getElementById('ciudadSelect');
                   
                    ciudadSelect.innerHTML = ''; // Limpiar las opciones actuales
                    ciudadSelect.innerHTML = '<option value="">Selecciona una ciudad</option>';

                    data.forEach(ciudad => {
                        var option = document.createElement('option');
                        option.value = ciudad;
                        option.textContent = ciudad;
                        ciudadSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error("Error al obtener las ciudades desde la API:", error);
                });
        });
    </script>
        
<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido</p>
<?php endif; ?>





