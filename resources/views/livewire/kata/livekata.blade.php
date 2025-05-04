<div>

    <div class="panel">

        <div class="panel-heading" style="padding:0.5rem">
            <div class="panel-title">
                <h4>Tatami N°</h4>
                <div id="n"></div>
            </div>

        </div>




        <div class="panel-body">
            <div class="container " style="border:2px; border-color: BLACK">
                <!-- Primera fila -->
                <div class="row g-0">
                    <div class="col-md-4">
                        <h5>Categoria</h5>
                    </div>
                    <div class="col-md-8">
                        <h5>| Ronda</h5>
                    </div>
                </div>
                <!-- Segunda fila -->
                <div class="row g-0">
                    <div class="col-md-4">
                        <div style="width: 100%; height: 100px; background-color: red;"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>Nombre</h5>
                        <p>Dojo</p>
                    </div>
                    <div class="col-md-2">
                        <h5>Cinturon</h5>
                        <div style="width: 50px; height: 20px; background-color: black;"></div>
                    </div>
                </div>
                <!-- Tercera fila -->
                <div class="row">
                    <div class="col-md-9" style="text-align: end">
                        <h5>KATAAAAAAAAAAAAAAAAA</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Juez 1</th>
                        <th scope="col">Juez 2</th>
                        <th scope="col">Juez 3</th>
                        <th scope="col">Juez 4</th>
                        <th scope="col">Juez 5</th>
                        <th scope="col">Juez 6</th>
                        <th scope="col">Juez 7</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto1">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="total1">0</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
    <div class="panel">

        <div class="panel-heading" style="padding:0.5rem">
            <div class="panel-title">
                <h4>Tatami N°</h4>
            </div>

        </div>




        <div class="panel-body">
            <div class="container " style="border:2px; border-color: BLACK">
                <!-- Primera fila -->
                <div class="row g-0">
                    <div class="col-md-4">
                        <h5>Categoria</h5>
                    </div>
                    <div class="col-md-8">
                        <h5>| Ronda</h5>
                    </div>
                </div>
                <!-- Segunda fila -->
                <div class="row g-0">
                    <div class="col-md-4">
                        <div style="width: 100%; height: 100px; background-color: blue;"></div>
                    </div>
                    <div class="col-md-4">
                        <h5>Nombre</h5>
                        <p>Dojo</p>
                    </div>
                    <div class="col-md-2">
                        <h5>Cinturon</h5>
                        <div style="width: 50px; height: 20px; background-color: black;"></div>
                    </div>
                </div>
                <!-- Tercera fila -->
                <div class="row">
                    <div class="col-md-9" style="text-align: end">
                        <h5>KATAAAAAAAAAAAAAAAAA</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Juez 1</th>
                        <th scope="col">Juez 2</th>
                        <th scope="col">Juez 3</th>
                        <th scope="col">Juez 4</th>
                        <th scope="col">Juez 5</th>
                        <th scope="col">Juez 6</th>
                        <th scope="col">Juez 7</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="punto2">0</p>
                        </td>
                        <td class="cell-fit p-0">
                            <p class="total2">0</p>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>


    </div>

    <style>
        .cell-fit {
            padding: 4px !important;
            width: 10%;
            /* Fuerza el ancho mínimo */
            white-space: nowrap;
        }
    </style>


    @script

    <script>
        if (typeof window.Echo !== 'undefined') {
            console.log('Laravel Echo está definido y listo para usar.');
            window.Echo.channel('channel')
                .listen('.live', (e) => {
                    console.log(e.data);

                    // Llama a la función para actualizar los puntos de la primera tabla
                    updatePoints('1', e.data.puntos1, e.data.total1);

                    // Llama a la función para actualizar los puntos de la segunda tabla
                    updatePoints('2', e.data.puntos2, e.data.total2);
                });
        } else {
            console.error('Laravel Echo no está definido. Verifica tu configuración.');
        }

        function updatePoints(tabla, puntaje, total) {
            const puntos = document.querySelectorAll(".punto"+tabla);
            const totalCelda = document.querySelector(".total"+tabla);
            let index = 0;
            console.log(puntos);
            function actualizarPunto() {
                if (index < puntos.length) {
                    const juezKey = "juez" + (index + 1);
                    puntos[index].textContent = puntaje[juezKey];

                    // Actualizar total
                    if (index === puntos.length - 1) {
                        setTimeout(() => {
                            totalCelda.textContent = total;
                            puntos.forEach(punto => {
                             
                        }, 1000);

                    }

                    index++;
                    setTimeout(actualizarPunto, 1000); // espera 30 segundos
                }
            }
            actualizarPunto();
        }
    </script>
    @endscript

</div>