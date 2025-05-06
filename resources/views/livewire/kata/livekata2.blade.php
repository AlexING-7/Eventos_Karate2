<div>
    <style>
        #livekata {
            font-family: Arial, sans-serif;
            color: white;
            margin: 0;
            padding: 20px;
            background-color: white;
        }

        .contenedor {
            background: #3c3d3d;
            border-radius: 5px;
            padding: 25px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.822);
            max-width: 900px;
            margin: auto;
        }

        .cabezera {
            text-align: center;
            margin-bottom: 5px;
        }

        .info-container {
            display: flex;
            align-items: center;
            text-align: left;
        }

        .cuadro-rojo {
            background-color: red;
            padding: 50px;
            border-radius: 5px;
            width: 150px;
        }

        .cuadro-azul {
            background-color: blue;
            padding: 50px;
            border-radius: 5px;
            width: 150px;
        }

        .info {
            margin-left: 15px;
        }

        .titulo-evento {
            color: rgb(255, 255, 255);
            background: #ffffff36;
            text-align: left;
        }

        .competidor,
        .dojo {
            color: white;
            margin: 5px 0;
        }

        .score-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .score-table th {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: center;
        }

        .score-table td {
            border: 1px solid #ddd;
            padding: 1px;
            text-align: center;
        }

        .total {
            text-align: right;
        }

        h2,
        h3 {
            text-align: right;
        }

        .tipo-kata,
        .cinturon {
            color: white;
        }

        .total1,
        .total2, 
        .punto2,
        .punto1 {
            color: white;
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }

       .red {
            color: red;
        }

        .strikethrough {
            text-decoration: line-through;
            text-decoration-thickness: 3px;
        }

        .cabezera.tatami {
            text-align: center;
            /* Centra el texto horizontalmente */
            margin: auto;
            /* Centra el contenedor horizontalmente */
            display: flex;
            /* Para centrar verticalmente */
            flex-direction: column;
            /* Asegura que los elementos estén en columna */
            align-items: center;
            /* Centra los elementos hijos horizontalmente */
            justify-content: center;
            /* Centra los elementos hijos verticalmente */
            color: blue

            .ventana-ganador {
            
            /* Ocultar el modal por defecto */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo semitransparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            
        }

        .ventana-contenido {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            width: 50%;
            max-width: 400px;
        }

        .ventana-contenido.red {
            background-color: red;
            /* Fondo rojo para AKA */
        }

        .ventana-contenido.blue {
            background-color: blue;
            /* Fondo azul para AO */
        }
        }
    </style>
        
     <div class="row">
        <div class="col-lg-12">

            <div class="panel">
                <div class="panel-body ">

                    <h1 class="text-center text-success">EN VIVO</h1>

                </div>

            </div>

        </div>
        <div class="col-lg-12">

            <div class="cabezera tatami">
                <h2>{{$tatami}}</h2>
                <div id="n"></div>
            </div>
        
            <div class="panel-body">
                <div id="livekata">
                    <div class="cabezera">
                        <div class="contenedor">
                            <div class="Kata">
                                <h1 class="titulo-evento">
                                    <span id="v-kata">{{$categoria}}</span> |
                                    <span id="numero-combate">{{$ronda}}</span>
                                </h1>
                                <div class="info-container">
                                    <div class="cuadro-rojo"></div>
                                    <div class="info">
                                        <h1 class="competidor">{{$nombre1}}</h1>
                                        <h1 class="dojo">{{$dojo1}}</h1>
                                    </div>
                                </div>
                                <h2 class="cinturon">
                                    <span> CINTURÓN:</span>
                                    <span id="color-cinturon">{{$cinturon1}}</span>
                                </h2>
                                <h2 class="tipo-kata">
                                    <span id="tipo">{{strtoupper($kata1->kata)}}</span>
                                </h2>
                            </div>
        
                            <table class="score-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Juez 1</th>
                                        <th>Juez 2</th>
                                        <th>Juez 3</th>
                                        <th>Juez 4</th>
                                        <th>Juez 5</th>
                                        <th>Juez 6</th>
                                        <th>Juez 7</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Performance</th>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="punto1">0</p>
                                        </td>
                                        <td>
                                            <p class="total1">0</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        
                    </div>
                </div>
        
            </div>
        
            <div class="panel-body">
                <div id="livekata">
                    <div class="cabezera">
                        <div class="contenedor">
                            <div class="Kata">
                                <h1 class="titulo-evento">
                                    <span id="v-kata">{{$categoria}}</span> |
                                    <span id="numero-combate">{{$ronda}}</span>
                                </h1>
                                <div class="info-container">
                                    <div class="cuadro-azul"></div>
                                    <div class="info">
                                        <h1 class="competidor">{{$nombre2}}</h1>
                                        <h1 class="dojo">{{$dojo2}}</h1>
                                    </div>
                                </div>
                                <h2 class="cinturon">
                                    <span> CINTURÓN:</span>
                                    <span id="color-cinturon">{{$cinturon2}}</span>
                                </h2>
                                <h2 class="tipo-kata">
                                    <span id="tipo">{{strtoupper($kata2->kata)}}</span>
                                </h2>
                            </div>
        
                            <table class="score-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Juez 1</th>
                                        <th>Juez 2</th>
                                        <th>Juez 3</th>
                                        <th>Juez 4</th>
                                        <th>Juez 5</th>
                                        <th>Juez 6</th>
                                        <th>Juez 7</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Performance</th>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="punto2">0</p>
                                        </td>
                                        <td>
                                            <p class="total2">0</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
        
                    </div>
                </div>
        
            </div>

        </div>
    </div>
 

    @script

    <script>
        if (typeof window.Echo !== 'undefined') {
            console.log('Laravel Echo está definido y listo para usar.');
            const idCombate = {{$id_combate}};
            window.Echo.channel(`channel.${idCombate}`)
                .listen('.live', (e) => {
                    console.log(e.data);

                    // Llama a la función para actualizar los puntos de la primera tabla
                    updatePoints('1', e.data.puntos1, e.data.total1,e.data.celdas1);

                    // Llama a la función para actualizar los puntos de la segunda tabla
                    updatePoints('2', e.data.puntos2, e.data.total2,e.data.celdas2);


                });
        } else {
            console.error('Laravel Echo no está definido. Verifica tu configuración.');
        }

        function updatePoints(tabla, puntaje, total,celdas) {
            const puntos = document.querySelectorAll(".punto" + tabla);
            const totalCelda = document.querySelector(".total" + tabla);
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
                            for (let i = 0; i < puntos.length; i++) {
                                const verdadero=celdas["juez" + (i + 1)];
                                if (verdadero) {
                                    puntos[i].classList.remove('red');
                                    puntos[i].classList.remove('strikethrough');                                    
                                } else {
                                    puntos[i].classList.add('red');
                                    puntos[i].classList.add('strikethrough');
                                }
                            }
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