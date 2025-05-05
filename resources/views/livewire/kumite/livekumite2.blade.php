<div>
    <style>
        #livekumite {
            
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
            background-color: rgb(50, 250, 1);
        }

        .cuadro-senchu2 {
            background-color: rgb(50, 250, 1);
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

        .falta1c,
        .falta2c,
        .falta3c,
        .faltahc,
        .faltah,
        .falta2-1c,
        .falta2-2c,
        .falta2-3c,
        .falta2-hc,
        .falta2-h {
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
    </style>
    <div id="livekumite">
        <div class="contenedor">
            <div class="combate">
                <div class="team" id="team1">
                    <h1 class="dojo">DOJO1</h1>
                    <p class="nombre-atleta">MEZIANE<br>Rayane</p>
                </div>
                <div class="team" id="team2">
                    <h1 class="dojo">DOJO2</h1>
                    <p class="nombre-atleta">YATOJI<br>Yoshito</p>
                </div>
            </div>
            <div class="senchu">
                <div class="cuadro-senchu1">S</div>
                <div class="cuadro-senchu2">S</div>
            </div>
            <div class="Puntuaciones">
                <div class="cuadro-puntaje red">
                    <span class="puntos2">0</span>
                </div>
                <div class="cuadro-puntaje blue">
                    <span class="puntos1">0</span>
                </div>
            </div>
            <div class="faltas">
                <div class="faltas1">
                    <div class="falta1c">1C</div>
                    <div class="falta2c">2C</div>
                    <div class="falta3c">3C</div>
                    <div class="faltahc">HC</div>
                    <div class="faltah">H</div>
                </div>
                <div class="faltas2">
                    <div class="falta2-1c">1C</div>
                    <div class="falta2-2c">2C</div>
                    <div class="falta2-3c">3C</div>
                    <div class="falta2-hc">HC</div>
                    <div class="falta2-h">H</div>
                </div>
            </div>
            <div class="información">
                <div class="tatami-contenedor">
                    <h2 class="tatami-info">TATAMI 1</h2>
                    <h2 class="combate-info">
                        <span id="genero">M</span> |
                        <span id="peso">60 KG</span>
                    </h2>
                </div>
                <div class="tiempo">
                    <h1 id="contador">2:24</h1>
                </div>
                <div class="medalla-contenedor">
                    <h2 class="medalla">MEDALLA DE<br>BRONCE</h2>
                    <h2 class="numero-medalla">#1899</h2>
                </div>
            </div>
        </div>
    </div>
    
    @script
    <script>
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
                        document.getElementById('scoreA').textContent = e.data.scoreA;
                        document.getElementById('scoreB').textContent = e.data.scoreB;
                    }
                    if (e.data.type === 'senshu') {
                        // Actualizar el estado de senshu
                        const akaSenshu = document.querySelector('.aka .senshu-star');
                        const aoSenshu = document.querySelector('.ao .senshu-star');

                        if (e.data.senshuA) {
                            akaSenshu.style.display = 'block';
                        } else {
                            akaSenshu.style.display = 'none';
                        }

                        if (e.data.senshuB) {
                            aoSenshu.style.display = 'block';
                        } else {
                            aoSenshu.style.display = 'none';
                        }
                    }
                    if (e.data.type === 'faltas') {
                        // Actualizar las faltas
                        const penaltiesA = document.querySelector('.aka .penalties');
                        const penaltiesB = document.querySelector('.ao .penalties');

                        penaltiesA.innerHTML = e.data.faltasA.map(falta => `<div class="card">${falta}</div>`).join('');
                        penaltiesB.innerHTML = e.data.faltasB.map(falta => `<div class="card">${falta}</div>`).join('');
                    }

                });
        } else {
            console.error('Laravel Echo no está definido. Verifica tu configuración.');
        }
        function updateTimerDisplay(reloj) {
            const min = String(Math.floor(reloj / 60)).padStart(2, '0');
            const sec = String(reloj % 60).padStart(2, '0');
            document.getElementById('timer-display').textContent = `${min}:${sec}`;
        }
    </script>
    @endscript
</div>