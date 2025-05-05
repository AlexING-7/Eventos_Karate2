<div>
    <style>
        .kumite-container {
            font-family: sans-serif;
            text-align: center;
            max-width: 800px;
            margin: auto;
        }

        .scoreboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .aka,
        .ao {
            flex: 1;
            padding: 10px;
        }

        .aka {
            background-color: #c62828;
            color: white;
        }

        .ao {
            background-color: #1565c0;
            color: white;
        }

        .score {
            font-size: 2.5rem;
        }

        .timer {
            flex: 1;
            padding: 10px;
        }

        .time {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .toggle-btn,
        .reset-btn {
            margin: 5px;
            padding: 10px 15px;
            font-size: 1rem;
        }

        .controls {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .controls button {
            margin: 5px;
            padding: 10px 15px;
            font-weight: bold;
        }

        .red {
            background: #e53935;
            color: white;
        }

        .blue {
            background: #2196f3;
            color: white;
        }

        .kumite-container {
            position: relative;
        }

        .aka,
        .ao {
            position: relative;
        }

        .senshu-star {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 1.5rem;
            color: yellow;
            display: none; /* Initially hidden */
        }

        .penalties {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .card {
            width: 25px;
            height: 35px;
            background-color: yellow;
            border: 1px solid #333;
            border-radius: 4px;
            text-align: center;
            line-height: 35px;
            font-weight: bold;
            font-size: 1.2rem;
            color: #333
            ;
        }
    </style>
    <div class="kumite-container">
        <div class="scoreboard">
            <div class="aka">
                <h2>AKA</h2>
                <div class="score" id="scoreA">0</div>
                    <div class="senshu-star">⭐</div>
                <div class="penalties">

                    {{-- <div class="card">1C</div>
                    <div class="card">2C</div>
                    <div class="card">3C</div>
                    <div class="card">HC</div>
                    <div class="card">H</div> --}}


                </div>
            </div>

            <div class="timer">
                <div class="time" id="timer-display">{{ gmdate('i:s', $time) }}</div>
            </div>

            <div class="ao">
                <h2>AO</h2>
                <div class="score" id="scoreB">0</div>
                    <div class="senshu-star">⭐</div>
                <div class="penalties">

                    {{-- <div class="card">1C</div>
                    <div class="card">2C</div>
                    <div class="card">3C</div>
                    <div class="card">HC</div>
                    <div class="card">H</div> --}}

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
            window.Echo.channel('channel-Kumite')
                .listen('.livekumite', (e) => {
                    console.log('Ejecutar :', e.data.type,e.data);

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