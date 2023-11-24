<?= $layout = $view->loadLayout('@layouts/default') ?>
<?= $layout->startSection('content') ?>
<section class="h-100  section" style="background-color: #eee;">
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center ">
            <h2>ZSSN DATA</h2>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body" id="survivorsCard">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body" id="infectedCard">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body" id="pointsLostCard">
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>%</th>
                            <!-- Agrega más encabezados según los datos de tu API -->
                        </tr>
                    </thead>
                    <tbody id="survivorsItemsTableBody">
                        <!-- Las filas se agregarán aquí dinámicamente -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    // Hacer una solicitud GET a la API
    const urlSite = 'YourUrl';
    fetch(urlSite + '/api/survivors/percentage')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error de red - ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Manejar los datos de la respuesta
            displayDataInCard('survivorsCard', 'Survivor%', data);
        })
        .catch(error => {
            // Manejar errores de red o de la API
            console.error('Error en la solicitud:', error.message);
        });

    // Hacer una solicitud GET a la API
    fetch(urlSite + '/api/infected/percentage')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error de red - ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Manejar los datos de la respuesta
            displayDataInCard('infectedCard', 'Infected%', data);
        })
        .catch(error => {
            // Manejar errores de red o de la API
            console.error('Error en la solicitud:', error.message);
        });

    // Hacer una solicitud GET a la API
    fetch(urlSite + '/api/items/points-lost')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error de red - ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Manejar los datos de la respuesta
            displayDataInCard('pointsLostCard', 'Points Lost', data);
        })
        .catch(error => {
            // Manejar errores de red o de la API
            console.error('Error en la solicitud:', error.message);
        });

    // Hacer una solicitud GET a la API
    fetch(urlSite + '/api/items/average')
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error de red - ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // Manejar los datos de la respuesta
            displayDataInTable(data);
        })
        .catch(error => {
            // Manejar errores de red o de la API
            console.error('Error en la solicitud:', error.message);
        });

    // Función para mostrar datos en la Card de Bootstrap
    function displayDataInCard(card, title, data) {
        const tableBody = document.getElementById(card);

        // Limpiar el contenido actual de la tabla
        tableBody.innerHTML = '';

        // Iterar sobre los datos y agregar filas a la tabla
        data.forEach(survivor => {
            const row = `
            <h5 class="card-title">${title}</h5>
            <p class="card-text">${survivor.percentages}</p>`;
            tableBody.innerHTML += row;
        });
    }

    // Función para mostrar datos en la tabla de Bootstrap
    function displayDataInTable(data) {
        const tableBody = document.getElementById('survivorsItemsTableBody');

        // Limpiar el contenido actual de la tabla
        tableBody.innerHTML = '';

        // Iterar sobre los datos y agregar filas a la tabla
        data.forEach(item => {
            const row = `<tr>
                            <td>${item.id_item}</td>
                            <td>${item.nombre}</td>
                            <td>${item.promedio_stock}</td>
                        </tr>`;
            tableBody.innerHTML += row;
        });
    }
</script>
<?= $layout->endSection() ?>
