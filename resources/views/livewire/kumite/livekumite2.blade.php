<div>
    <style>
        #livekumite {
            background-color: #3c3d3d;
            padding: 5rem;
            color: white;
            font-family: Arial, sans-serif;
        }

        .contenedor {
            background: #3c3d3d;
            border-radius: 5px;
            padding: 40px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.822);
            max-width: 1000px;
            margin: auto;
            margin-top: 20px;
            line-height: 1.0;
        }

        .combate {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .team {
            background-color: transparent;
            width: auto;
        }

        .nombre-atleta {
            font-size: 36px;
            font-weight: bold;
        }

        .senchu {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .cuadro-senchu1,
        .cuadro-senchu2 {
            width: 70px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin: 0 40px;
        }

        .cuadro-senchu1 {
            color: #3c3d3d;
            background-color: #3c3d3d;
        }

        .cuadro-senchu2 {
            color: #3c3d3d;
            background-color: #3c3d3d;
        }

        .Puntuaciones {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cuadro-puntaje {
            width: 130px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 36px;
            border-radius: 10px;
            margin: 0 10px;
        }

        .blue {
            background-color: red;
        }

        .red {
            background-color: blue;
        }

        .tiempo {
            font-size: 40px;
            font-weight: bold;
            color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .faltas {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }

        .faltas1,
        .faltas2 {
            display: flex;
        }

        .faltas1 {
            justify-content: flex-start;
        }

        .faltas2 {
            justify-content: flex-end;
        }


        .faltachui {
            width: 60px;
            height: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            margin: 0 3px;
            padding: 0;
            background-color: rgb(255, 251, 0);
            color: black;
        }

        .información {
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-align: center;
            gap: 90px;
        }

        .tatami-contenedor {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            width: 60%;
        }

        .medalla-contenedor {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 60%;
        }

        h2,
        p {
            margin: 0;
            padding: 0;
        }

        #peso,
        #genero,
        .tatami-info,
        .medalla,
        #contador,
        .dojo {
            color: white;
        }

        #team1 .nombre-atleta {
            text-align: left
        }

        #team2 .nombre-atleta {
            text-align: right
        }

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
    </style>
    <div id="ventana-ganador" class="ventana-ganador" style="display: none;">
        {{-- Ventana emergente para mostrar el ganador --}}
        <div id="ventana-content" class="ventana-contenido">
            <h1 id="ventana-text"></h1>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel">
                    <div class="panel-body ">

                        <h1 class="text-center text-success">EN VIVO</h1>

                    </div>

                </div>

            </div>
            <div class="col-lg-12">
                <div id="livekumite">
                    <div class="contenedor">
                        <div class="combate">
                            <div class="team" id="team1">
                                <h1 class="dojo">{{strtoupper($participantes1->dojo)}}</h1>
                                <p class="nombre-atleta">
                                    {{strtoupper($participantes1->primer_apellido)}}<br>{{strtoupper($participantes1->primer_nombre)}}
                                </p>
                            </div>
                            <div class="team" id="team2">
                                <h1 class="dojo">{{strtoupper($participantes2->dojo)}}</h1>
                                <p class="nombre-atleta">
                                    {{strtoupper($participantes2->primer_apellido)}}<br>{{strtoupper($participantes2->primer_nombre)}}
                                </p>
                            </div>
                        </div>
                        <div class="senchu">
                            <div class="cuadro-senchu1">S</div>
                            <div class="cuadro-senchu2">S</div>
                        </div>
                        <div class="Puntuaciones">
                            <div class="cuadro-puntaje blue">
                                <span id="puntos1">{{$scoreA}}</span>
                            </div>
                            <div class="cuadro-puntaje red">
                                <span id="puntos2">{{$scoreB}}</span>
                            </div>
                        </div>
                        <div class="faltas">
                            <div class="faltas1">
                                {{-- <div class="faltachui">1C</div>
                                <div class="faltachui">2C</div>
                                <div class="faltachui">3C</div>
                                <div class="faltachui">HC</div>
                                <div class="faltachui">H</div> --}}
                            </div>
                            <div class="faltas2">
                                {{-- <div class="faltachui">1C</div>
                                <div class="faltachui">2C</div>
                                <div class="faltachui">3C</div>
                                <div class="faltachui">HC</div>
                                <div class="faltachui">H</div> --}}
                            </div>
                        </div>
                        <div class="información">
                            <div class="tatami-contenedor">
                                <h2 class="tatami-info">{{strtoupper($tatami)}}</h2>
                                <h2 class="combate-info">
                                    <span id="genero">{{substr($categoria->genero, 0, 1)}}</span> <span
                                        style="color:white;">|</span>
                                    <span id="peso">{{floor($peso)}} KG</span>
                                </h2>
                            </div>
                            <div class="tiempo">
                                <h1 id="contador">{{ gmdate('i:s', $time) }}</h1>
                            </div>
                            <div class="medalla-contenedor">
                                <h2 class="medalla">{{$fase}}<br>{{$ronda}}</h2>
                                {{-- <h2 class="numero-medalla">#1899</h2> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        @script
        <script>

            const akaSenshu1 = document.querySelector('.cuadro-senchu1');
            const aoSenshu1 = document.querySelector('.cuadro-senchu2');
            if ({{$senshuA}}) {
                akaSenshu1.style.color = 'white'
                akaSenshu1.style.backgroundColor = 'rgb(50, 250, 1)';
            } else {
                akaSenshu1.style.color = '#3c3d3d'
                akaSenshu1.style.backgroundColor = '#3c3d3d';
            }

            if ({{$senshuB}}) {
                aoSenshu1.style.color = 'white'
                aoSenshu1.style.backgroundColor = 'rgb(50, 250, 1)';
            } else {
                aoSenshu1.style.color = '#3c3d3d'
                aoSenshu1.style.backgroundColor = '#3c3d3d';
            }

            if (typeof window.Echo !== 'undefined') {
                console.log('Laravel Echo está definido y listo para usar.');

                // Escuchar el evento de sincronización del cronómetro
                const idCombate = {{$id_combate}};
                window.Echo.channel(`timer-channel.${idCombate}`)
                    .listen('.relojkumite', (e) => {
                        console.log('Tiempo restante sincronizado:', e.data.remaining);

                        // Actualizar el cronómetro en el frontend
                        updateTimerDisplay(e.data.remaining);
                    });

                // Escuchar el evento de actualización de puntuación
                window.Echo.channel(`channel-Kumite.${idCombate}`)
                    .listen('.livekumite', (e) => {
                        console.log('Ejecutar :', e.data.type, e.data);

                        if (e.data.type === 'score') {
                            // Actualizar la puntuación en el frontend
                            document.getElementById('puntos1').textContent = e.data.scoreA;
                            document.getElementById('puntos2').textContent = e.data.scoreB;
                        }
                        if (e.data.type === 'senshu') {
                            // Actualizar el estado de senshu
                            const akaSenshu = document.querySelector('.cuadro-senchu1');
                            const aoSenshu = document.querySelector('.cuadro-senchu2');

                            if (e.data.senshuA) {
                                akaSenshu.style.color = 'white'
                                akaSenshu.style.backgroundColor = 'rgb(50, 250, 1)';
                            } else {
                                akaSenshu.style.color = '#3c3d3d'
                                akaSenshu.style.backgroundColor = '#3c3d3d';
                            }

                            if (e.data.senshuB) {
                                aoSenshu.style.color = 'white'
                                aoSenshu.style.backgroundColor = 'rgb(50, 250, 1)';
                            } else {
                                aoSenshu.style.color = '#3c3d3d'
                                aoSenshu.style.backgroundColor = '#3c3d3d';
                            }
                        }
                        if (e.data.type === 'faltas') {
                            // Actualizar las faltas
                            const penaltiesA = document.querySelector('.faltas .faltas1');
                            const penaltiesB = document.querySelector('.faltas .faltas2');

                            penaltiesA.innerHTML = e.data.faltasA.map(falta => `<div class="faltachui">${falta}</div>`).join('');
                            penaltiesB.innerHTML = e.data.faltasB.map(falta => `<div class="faltachui">${falta}</div>`).join('');
                        }

                        if (e.data.type === 'ganador') {
                            const modal = document.getElementById('ventana-ganador');
                            const modalContent = document.getElementById('ventana-content');
                            const modalText = document.getElementById('ventana-text');

                            if (e.data.ganador === 'A') {
                                modalContent.classList.add('red');
                                modalContent.classList.remove('blue');
                                modalText.textContent = 'GANO AKA';
                            } else if (e.data.ganador === 'B') {
                                modalContent.classList.add('blue');
                                modalContent.classList.remove('red');
                                modalText.textContent = 'GANO AO';
                            }

                            // Mostrar el modal
                            modal.style.display = 'flex';

                            // Ocultar el modal después de 5 segundos
                            setTimeout(() => {
                                modal.style.display = 'none';
                            }, 5000);
                        }

                    });
            } else {
                console.error('Laravel Echo no está definido. Verifica tu configuración.');
            }
            function updateTimerDisplay(reloj) {
                const min = String(Math.floor(reloj / 60)).padStart(2, '0');
                const sec = String(reloj % 60).padStart(2, '0');
                document.getElementById('contador').textContent = `${min}:${sec}`;
            }
        </script>
        @endscript
    </div>