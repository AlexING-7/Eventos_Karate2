<x-app-layout>

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">

                <div class="pad-all text-center">
                    <h3>Torneo Oficial tipo WKF</h3>
                    <p>Sistema Round Robin - Kumite & Kata</p>
                </div>
            </div>


            <!--Page content-->
            <!--===================================================-->
            <!DOCTYPE html>
            <html lang="es">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Torneo WKF - Sistema Round Robin</title>
                    <link
                        href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Roboto:wght@300;400;700&display=swap"
                        rel="stylesheet">
                    <style>
                        :root {
                            --wkf-red: #c00;
                            --wkf-dark: #222;
                            --wkf-light: #f8f8f8;
                            --wkf-gold: #ffd700;
                            --wkf-silver: #c0c0c0;
                            --wkf-bronze: #cd7f32;
                            --belt-white: #ffffff;
                            --belt-yellow: #ffff00;
                            --belt-orange: #ffa500;
                            --belt-green: #008000;
                            --belt-blue: #0000ff;
                            --belt-brown: #8b4513;
                            --belt-black: #000000;
                            --tatami-blue: #1e90ff;
                            --tatami-red: #ff4500;
                        }


                        h1,
                        h2,
                        h3,
                        h4 {
                            font-family: 'Oswald', sans-serif;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        }

                        h1 {
                            font-size: 2.5rem;
                            margin-bottom: 0.5rem;
                            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
                        }

                        .container {
                            max-width: 1400px;
                            margin: 0 auto;
                            padding: 1.5rem;
                        }

                        /* Pestañas */
                        .main-tabs {
                            display: flex;
                            margin-bottom: 1.5rem;
                            border-bottom: 2px solid var(--wkf-red);
                        }

                        .main-tab {
                            padding: 0.8rem 1.5rem;
                            cursor: pointer;
                            background-color: var(--wkf-light);
                            margin-right: 0.3rem;
                            border-radius: 5px 5px 0 0;
                            transition: all 0.3s ease;
                            font-weight: 700;
                            color: var(--wkf-dark);
                            position: relative;
                            overflow: hidden;
                            border: 1px solid #ddd;
                            border-bottom: none;
                        }

                        .main-tab::before {
                            content: "";
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            width: 100%;
                            height: 0;
                            background-color: var(--wkf-red);
                            transition: all 0.3s ease;
                        }

                        .main-tab:hover {
                            color: var(--wkf-red);
                        }

                        .main-tab:hover::before {
                            height: 4px;
                        }

                        .main-tab.active {
                            background-color: white;
                            color: var(--wkf-red);
                            border-color: var(--wkf-red);
                        }

                        .main-tab.active::before {
                            height: 4px;
                        }

                        .main-tab-content {
                            display: none;
                            animation: fadeIn 0.5s ease;
                        }

                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                                transform: translateY(10px);
                            }

                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        .main-tab-content.active {
                            display: block;
                        }

                        /* Sub-pestañas */
                        .sub-tabs {
                            display: flex;
                            margin-bottom: 1.5rem;
                            flex-wrap: wrap;
                            gap: 0.5rem;
                        }

                        .sub-tab {
                            padding: 0.6rem 1.2rem;
                            cursor: pointer;
                            background-color: #f1f1f1;
                            border-radius: 4px;
                            transition: all 0.3s ease;
                            font-weight: 500;
                            font-size: 0.9rem;
                            border: 1px solid #ddd;
                        }

                        .sub-tab:hover {
                            background-color: #e1e1e1;
                        }

                        .sub-tab.active {
                            background-color: var(--wkf-red);
                            color: white;
                            border-color: var(--wkf-red);
                        }

                        .sub-tab-content {
                            display: none;
                            animation: fadeIn 0.3s ease;
                        }

                        .sub-tab-content.active {
                            display: block;
                        }

                        /* Filtros */
                        .filters {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 1rem;
                            margin-bottom: 1.5rem;
                            padding: 1.2rem;
                            background-color: white;
                            border-radius: 5px;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                            align-items: center;
                        }

                        .filter-group {
                            display: flex;
                            flex-direction: column;
                            min-width: 180px;
                        }

                        .filter-label {
                            font-size: 0.8rem;
                            font-weight: bold;
                            margin-bottom: 0.3rem;
                            color: var(--wkf-red);
                        }

                        select,
                        input {
                            padding: 0.6rem;
                            border: 1px solid #ddd;
                            border-radius: 4px;
                            background-color: var(--wkf-light);
                            transition: all 0.3s ease;
                        }

                        select:focus,
                        input:focus {
                            outline: none;
                            border-color: var(--wkf-red);
                            box-shadow: 0 0 0 2px rgba(204, 0, 0, 0.2);
                        }

                        button {
                            padding: 0.6rem 1.2rem;
                            background-color: var(--wkf-red);
                            color: white;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            font-weight: bold;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        }

                        button:hover {
                            background-color: #a00;
                            transform: translateY(-2px);
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        }

                        button:active {
                            transform: translateY(0);
                        }

                        /* Grupos Round Robin */
                        .groups-container {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                            gap: 1.5rem;
                            margin-bottom: 2rem;
                        }

                        .group-card {
                            background-color: white;
                            border-radius: 5px;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                            overflow: hidden;
                            transition: all 0.3s ease;
                        }

                        .group-card:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                        }

                        .group-header {
                            padding: 0.8rem;
                            background: linear-gradient(135deg, var(--wkf-red), #a00);
                            color: white;
                            font-weight: bold;
                            text-align: center;
                            font-size: 1.2rem;
                        }

                        .group-table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        .group-table th,
                        .group-table td {
                            padding: 0.6rem;
                            text-align: center;
                            border-bottom: 1px solid #eee;
                        }

                        .group-table th {
                            background-color: #f5f5f5;
                            font-size: 0.8rem;
                            text-transform: uppercase;
                        }

                        .group-table tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }

                        .group-table tr:hover {
                            background-color: #f1f1f1;
                        }

                        .qualified {
                            background-color: #e6ffe6 !important;
                            font-weight: bold;
                        }

                        /* Brackets eliminatorios */
                        .bracket-container {
                            overflow-x: auto;
                            padding: 1rem 0;
                            margin-bottom: 2rem;
                        }

                        .bracket {
                            display: flex;
                            min-width: fit-content;
                            padding: 1rem 0;
                        }

                        .round {
                            display: flex;
                            flex-direction: column;
                            justify-content: space-around;
                            min-width: 250px;
                            margin-right: 2rem;
                            position: relative;
                        }

                        .round::after {
                            content: "";
                            position: absolute;
                            top: 0;
                            right: -1rem;
                            width: 1rem;
                            height: 100%;
                        }

                        .round-title {
                            text-align: center;
                            font-weight: bold;
                            margin-bottom: 1.5rem;
                            padding: 0.8rem;
                            background: linear-gradient(135deg, var(--wkf-red), #a00);
                            color: white;
                            border-radius: 4px;
                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
                            position: relative;
                            overflow: hidden;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        }

                        .match {
                            margin-bottom: 1.5rem;
                            padding: 0.8rem;
                            background-color: white;
                            border-radius: 4px;
                            border-left: 5px solid var(--wkf-red);
                            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                            transition: all 0.3s ease;
                            position: relative;
                            overflow: hidden;
                        }

                        .match:hover {
                            transform: translateY(-3px);
                            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                        }

                        .competitor {
                            display: flex;
                            justify-content: space-between;
                            padding: 0.5rem 0;
                            position: relative;
                        }

                        .winner {
                            font-weight: bold;
                            color: var(--wkf-red);
                            position: relative;
                        }

                        .winner::after {
                            content: "🏆";
                            margin-left: 0.5rem;
                            font-size: 0.9rem;
                        }

                        .score {
                            font-weight: bold;
                            color: var(--wkf-dark);
                            background-color: rgba(255, 255, 255, 0.7);
                            padding: 0 0.3rem;
                            border-radius: 3px;
                        }

                        .ippon {
                            color: #006600;
                        }

                        .wazari {
                            color: #003366;
                        }

                        .yuko {
                            color: #663300;
                        }

                        .match-details {
                            font-size: 0.8rem;
                            color: #666;
                            margin-top: 0.5rem;
                            padding-top: 0.5rem;
                            border-top: 1px dashed #ddd;
                        }

                        .tatami-info {
                            display: inline-block;
                            padding: 0.2rem 0.5rem;
                            background-color: var(--tatami-blue);
                            color: white;
                            border-radius: 3px;
                            font-size: 0.7rem;
                            font-weight: bold;
                            margin-right: 0.5rem;
                        }

                        .tatami-red {
                            background-color: var(--tatami-red);
                        }

                        /* Estadísticas de competidores */
                        .competitor-profile {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 1.5rem;
                            margin-bottom: 2rem;
                        }

                        .profile-card {
                            flex: 1;
                            min-width: 300px;
                            background-color: white;
                            border-radius: 5px;
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                            overflow: hidden;
                        }

                        .profile-header {
                            padding: 1rem;
                            background: linear-gradient(135deg, var(--wkf-red), #a00);
                            color: white;
                            display: flex;
                            align-items: center;
                        }

                        .belt-large {
                            width: 30px;
                            height: 8px;
                            margin-right: 1rem;
                            border-radius: 4px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                        }

                        .profile-body {
                            padding: 1.5rem;
                        }

                        .profile-row {
                            display: flex;
                            margin-bottom: 1rem;
                        }

                        .profile-label {
                            font-weight: bold;
                            min-width: 120px;
                            color: var(--wkf-red);
                        }

                        .stats-grid {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                            gap: 1rem;
                            margin-top: 1rem;
                        }

                        .stat-item {
                            background-color: #f9f9f9;
                            padding: 1rem;
                            border-radius: 5px;
                            text-align: center;
                        }

                        .stat-value {
                            font-size: 1.8rem;
                            font-weight: bold;
                            color: var(--wkf-red);
                        }

                        .stat-label {
                            font-size: 0.8rem;
                            color: #666;
                        }

                        .point-stats {
                            margin-top: 1.5rem;
                        }

                        .point-row {
                            display: flex;
                            align-items: center;
                            margin-bottom: 0.5rem;
                        }

                        .point-label {
                            min-width: 100px;
                            font-weight: bold;
                        }

                        .point-bar {
                            flex-grow: 1;
                            height: 20px;
                            background-color: #eee;
                            border-radius: 10px;
                            overflow: hidden;
                            margin: 0 1rem;
                            position: relative;
                        }

                        .point-progress {
                            height: 100%;
                            background: linear-gradient(90deg, var(--wkf-red), #f00);
                        }

                        .point-count {
                            min-width: 50px;
                            text-align: right;
                            font-weight: bold;
                        }

                        /* Tablas */
                        .table-container {
                            overflow-x: auto;
                            margin-bottom: 2rem;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                        }

                        th,
                        td {
                            padding: 0.8rem;
                            text-align: left;
                            border-bottom: 1px solid #ddd;
                        }

                        th {
                            background: linear-gradient(135deg, var(--wkf-red), #a00);
                            color: white;
                            font-weight: bold;
                            text-transform: uppercase;
                            font-size: 0.8rem;
                            letter-spacing: 1px;
                        }

                        tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }

                        tr:hover {
                            background-color: #f1f1f1;
                        }

                        .flag {
                            width: 20px;
                            height: 15px;
                            margin-right: 0.5rem;
                            vertical-align: middle;
                            border: 1px solid #ddd;
                        }

                        /* Responsive */
                        @media (max-width: 768px) {
                            .groups-container {
                                grid-template-columns: 1fr;
                            }

                            .bracket {
                                flex-direction: column;
                            }

                            .round {
                                margin-right: 0;
                                margin-bottom: 2rem;
                            }

                            .profile-card {
                                min-width: 100%;
                            }
                        }
                    </style>
                </head>

                <body>


                    <div class="container">


                        <!-- Pestañas principales -->
                        <div class="main-tabs">
                            <div class="main-tab active" data-tab="kumite">Kumite</div>
                            <div class="main-tab" data-tab="kata">Kata</div>
                        </div>

                        <!-- Contenido de Kumite -->
                        <div class="main-tab-content active" id="kumite">
                            <!-- Sub-pestañas de Kumite -->
                            <div class="sub-tabs">
                                <div class="sub-tab active" data-subtab="groups">Fase de Grupos</div>
                                <div class="sub-tab" data-subtab="bracket">Fase Eliminatoria</div>
                                <div class="sub-tab" data-subtab="competitors">Competidores</div>
                                <div class="sub-tab" data-subtab="stats">Estadísticas</div>
                            </div>

                            <!-- Filtros -->
                            <div class="filters">
                                <div class="filter-group">
                                    <label class="filter-label">Categoría</label>
                                    <select id="kumite-category" class="form-control">
                                        <option value="">Seleccione una categoría</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->disciplina }}
                                                {{ $categoria->nombre }} ! {{$categoria->peso}}KG</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <button id="kumite-filter">Aplicar Filtros</button>
                        </div>

                        <!-- Fase de Grupos -->
                        <div class="sub-tab-content active" id="groups-content">
                            <h2>Fase de Grupos - Round Robin</h2>
                            <p>8 grupos de 4 competidores cada uno. Todos contra todos en su grupo. Clasifican los 2
                                primeros de cada grupo (16 en total).</p>

                            <div class="groups-container" id="kumite-groups">
                                <!-- Grupos generados dinámicamente -->
                            </div>
                        </div>

                        <!-- Fase Eliminatoria -->
                        <div class="sub-tab-content" id="bracket-content">
                            <h2>Fase Eliminatoria</h2>
                            <p>16 competidores (2 de cada grupo) en sistema de eliminación directa.</p>

                            <div class="bracket-container">
                                <div class="bracket" id="kumite-bracket">
                                    <!-- Bracket generado dinámicamente -->
                                </div>
                            </div>
                        </div>

                        <!-- Competidores -->
                        <div class="sub-tab-content" id="competitors-content">
                            <h2>Competidores de Kumite</h2>

                            <div class="filters">
                                <div class="filter-group" style="flex-grow: 2;">
                                    <label class="filter-label">Buscar Competidor</label>
                                    <input type="text" id="kumite-search" placeholder="Nombre, país o grupo...">
                                </div>
                                <button id="kumite-search-btn">Buscar</button>
                            </div>

                            <div class="competitor-profile" id="kumite-profile">
                                <!-- Perfil de competidor generado dinámicamente -->
                            </div>

                            <h3>Todos los Competidores</h3>
                            <div class="table-container">
                                <table id="kumite-competitors-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Dojo</th>
                                            <th>Grupo</th>
                                            <th>Edad</th>
                                            <th>Cinta</th>
                                            <th>Victorias</th>
                                            <th>Puntos WKF</th>
                                            <th>Posición</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Datos generados dinámicamente -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Estadísticas -->
                        <div class="sub-tab-content" id="stats-content">
                            <h2>Estadísticas de Kumite</h2>

                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-value">32</div>
                                    <div class="stat-label">Competidores</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">48</div>
                                    <div class="stat-label">Encuentros</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">12</div>
                                    <div class="stat-label">Dojos</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">5</div>
                                    <div class="stat-label">Tatamis</div>
                                </div>
                            </div>

                            <h3>Distribución de Puntos WKF</h3>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Tipo de Punto</th>
                                            <th>Cantidad</th>
                                            <th>Porcentaje</th>
                                            <th>Ejemplos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Ippon</strong> (3 pts)</td>
                                            <td>24</td>
                                            <td>25%</td>
                                            <td>Jodan Geri, Ushiro Geri</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Waza-ari</strong> (2 pts)</td>
                                            <td>42</td>
                                            <td>44%</td>
                                            <td>Chudan Zuki, Mawashi Geri</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Yuko</strong> (1 pt)</td>
                                            <td>30</td>
                                            <td>31%</td>
                                            <td>Jodan Uke, Kizami Zuki</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3>Top Competidores</h3>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Posición</th>
                                            <th>Nombre</th>
                                            <th>Dojo</th>
                                            <th>Victorias</th>
                                            <th>Ippon</th>
                                            <th>Waza-ari</th>
                                            <th>Efectividad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Juan Pérez</td>
                                            <td> RSA</td>
                                            <td>5</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>92%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Carlos Gómez</td>
                                            <td>DSA</td>
                                            <td>4</td>
                                            <td>2</td>
                                            <td>5</td>
                                            <td>85%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Ana Rodríguez</td>
                                            <td> ARG</td>
                                            <td>4</td>
                                            <td>1</td>
                                            <td>6</td>
                                            <td>78%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido de Kata -->
                    <div class="main-tab-content" id="kata">
                        <!-- Sub-pestañas de Kata -->
                        <div class="sub-tabs">
                            <div class="sub-tab active" data-subtab="kata-groups">Fase de Grupos</div>
                            <div class="sub-tab" data-subtab="kata-bracket">Fase Eliminatoria</div>
                            <div class="sub-tab" data-subtab="kata-competitors">Competidores</div>
                            <div class="sub-tab" data-subtab="kata-stats">Estadísticas</div>
                        </div>

                        <!-- Filtros -->
                        <div class="filters">
                            <div class="filter-group">
                                <label class="filter-label">Categoría</label>
                                <select id="kata-category">
                                    <option value="senior">Senior (18+)</option>
                                    <option value="junior">Junior (14-17)</option>
                                    <option value="cadete">Cadete (12-13)</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label class="filter-label">Género</label>
                                <select id="kata-gender">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>

                            <button id="kata-filter">Aplicar Filtros</button>
                        </div>

                        <!-- Fase de Grupos -->
                        <div class="sub-tab-content active" id="kata-groups-content">
                            <h2>Fase de Grupos - Round Robin</h2>
                            <p>8 grupos de 4 competidores cada uno. Todos presentan kata en su grupo. Clasifican los 2
                                primeros de cada grupo (16 en total).</p>

                            <div class="groups-container" id="kata-groups">
                                <!-- Grupos generados dinámicamente -->
                            </div>
                        </div>

                        <!-- Fase Eliminatoria -->
                        <div class="sub-tab-content" id="kata-bracket-content">
                            <h2>Fase Eliminatoria</h2>
                            <p>16 competidores (2 de cada grupo) en sistema de eliminación directa.</p>

                            <div class="bracket-container">
                                <div class="bracket" id="kata-bracket">
                                    <!-- Bracket generado dinámicamente -->
                                </div>
                            </div>
                        </div>

                        <!-- Competidores -->
                        <div class="sub-tab-content" id="kata-competitors-content">
                            <h2>Competidores de Kata</h2>

                            <div class="filters">
                                <div class="filter-group" style="flex-grow: 2;">
                                    <label class="filter-label">Buscar Competidor</label>
                                    <input type="text" id="kata-search" placeholder="Nombre, país o grupo...">
                                </div>
                                <button id="kata-search-btn">Buscar</button>
                            </div>

                            <div class="competitor-profile" id="kata-profile">
                                <!-- Perfil de competidor generado dinámicamente -->
                            </div>

                            <h3>Todos los Competidores</h3>
                            <div class="table-container">
                                <table id="kata-competitors-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Dojo</th>
                                            <th>Grupo</th>
                                            <th>Edad</th>
                                            <th>Cinta</th>
                                            <th>Punt. Prom.</th>
                                            <th>Kata Favorito</th>
                                            <th>Posición</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Datos generados dinámicamente -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Estadísticas -->
                        <div class="sub-tab-content" id="kata-stats-content">
                            <h2>Estadísticas de Kata</h2>

                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-value">32</div>
                                    <div class="stat-label">Competidores</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">64</div>
                                    <div class="stat-label">Presentaciones</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">18</div>
                                    <div class="stat-label">Katas diferentes</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">8.4</div>
                                    <div class="stat-label">Puntaje promedio</div>
                                </div>
                            </div>

                            <h3>Katas más ejecutados</h3>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Kata</th>
                                            <th>Veces ejecutado</th>
                                            <th>Puntaje Prom.</th>
                                            <th>% Finales</th>
                                            <th>Top ejecutor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Kanku Dai</strong></td>
                                            <td>12</td>
                                            <td>8.5</td>
                                            <td>42%</td>
                                            <td>Luis Martínez (8.7)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Unsu</strong></td>
                                            <td>10</td>
                                            <td>8.7</td>
                                            <td>60%</td>
                                            <td>Carlos Gómez (8.9)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bassai Dai</strong></td>
                                            <td>8</td>
                                            <td>8.3</td>
                                            <td>38%</td>
                                            <td>Ana Rodríguez (8.5)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3>Top Competidores</h3>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Posición</th>
                                            <th>Nombre</th>
                                            <th>Dojo</th>
                                            <th>Punt. Prom.</th>
                                            <th>Kata Favorito</th>
                                            <th>% Victorias</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Luis Martínez</td>
                                            <td>SSA</td>
                                            <td>8.7</td>
                                            <td>Unsu</td>
                                            <td>94%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Carlos Gómez</td>
                                            <td>EXA</td>
                                            <td>8.5</td>
                                            <td>Kanku Dai</td>
                                            <td>88%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sofía García</td>
                                            <td> ARG</td>
                                            <td>8.4</td>
                                            <td>Empi</td>
                                            <td>82%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>

        <script>

            document.addEventListener('DOMContentLoaded', function () {
                // Datos de ejemplo para el torneo
                const countries = [
                    { code: 'ASD' },
                    { code: 'MXS' },
                    { code: 'ARG' },
                    { code: 'BRS' },
                    { code: 'CUT' },
                    { code: 'SA' },
                    { code: 'RE' },
                    { code: 'DA' },
                    { code: 'JP' },
                    { code: 'HU' },
                    { code: 'IT' },
                    { code: 'DE' }
                ];

                const katas = [
                    'Heian Shodan', 'Heian Nidan', 'Heian Sandan', 'Heian Yondan', 'Heian Godan',
                    'Tekki Shodan', 'Bassai Dai', 'Kanku Dai', 'Empi', 'Jion', 'Hangetsu', 'Unsu',
                    'Sochin', 'Nijushiho', 'Gojushiho Dai', 'Gojushiho Sho', 'Meikyo', 'Chinte'
                ];

                const techniques = [
                    { name: 'Jodan Mawashi Geri', type: 'ippon' },
                    { name: 'Ushiro Geri', type: 'ippon' },
                    { name: 'Chudan Gyaku Zuki', type: 'wazari' },
                    { name: 'Mawashi Geri Chudan', type: 'wazari' },
                    { name: 'Jodan Age Uke', type: 'yuko' },
                    { name: 'Kizami Zuki', type: 'yuko' },
                    { name: 'Chudan Uchi Uke', type: 'yuko' }
                ];

                // Generar competidores de ejemplo
                function generateCompetitors(type, count) {
                    const competitors = [];
                    const usedCountries = [];

                    for (let i = 0; i < count; i++) {
                        // Asegurar que no se repitan países en los primeros 8 competidores
                        let country;
                        if (i < 8) {
                            country = countries[i];
                            usedCountries.push(country.code);
                        } else {
                            const availableCountries = countries.filter(c => !usedCountries.includes(c.code));
                            if (availableCountries.length > 0) {
                                country = availableCountries[Math.floor(Math.random() * availableCountries.length)];
                                usedCountries.push(country.code);
                            } else {
                                country = countries[Math.floor(Math.random() * countries.length)];
                            }
                        }

                        const beltColors = [
                            { name: 'Blanca', color: 'var(--belt-white)' },
                            { name: 'Amarilla', color: 'var(--belt-yellow)' },
                            { name: 'Naranja', color: 'var(--belt-orange)' },
                            { name: 'Verde', color: 'var(--belt-green)' },
                            { name: 'Azul', color: 'var(--belt-blue)' },
                            { name: 'Marrón', color: 'var(--belt-brown)' },
                            { name: 'Negra', color: 'var(--belt-black)' }
                        ];

                        const belt = beltColors[Math.min(Math.floor(Math.random() * 8), 6)];
                        const age = type === 'kumite' ? 18 + Math.floor(Math.random() * 15) : 16 + Math.floor(Math.random() * 20);

                        const competitor = {
                            id: i + 1,
                            name: getRandomName(),
                            country: country,
                            age: age,
                            belt: belt,
                            group: String.fromCharCode(65 + (i % 8)),
                            position: (i % 4) + 1,
                            stats: {
                                wins: Math.floor(Math.random() * 5),
                                losses: Math.floor(Math.random() * 2),
                                ippon: Math.floor(Math.random() * 4),
                                wazari: Math.floor(Math.random() * 6),
                                yuko: Math.floor(Math.random() * 8),
                                favoriteKata: katas[Math.floor(Math.random() * katas.length)],
                                favoriteTechnique: techniques[Math.floor(Math.random() * techniques.length)].name
                            }
                        };

                        competitors.push(competitor);
                    }

                    return competitors;
                }

                // Generar datos para Kumite y Kata
                const kumiteCompetitors = generateCompetitors('kumite', 32);
                const kataCompetitors = generateCompetitors('kata', 32);

                // Manejo de pestañas principales
                const mainTabs = document.querySelectorAll('.main-tab');
                const mainTabContents = document.querySelectorAll('.main-tab-content');

                mainTabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        mainTabs.forEach(t => t.classList.remove('active'));
                        mainTabContents.forEach(c => c.classList.remove('active'));

                        tab.classList.add('active');
                        const tabId = tab.getAttribute('data-tab');
                        document.getElementById(tabId).classList.add('active');

                        // Actualizar la vista cuando se cambia de pestaña
                        if (tabId === 'kumite') {
                            updateKumiteGroups();
                            updateKumiteCompetitorsTable();
                        } else {
                            updateKataGroups();
                            updateKataCompetitorsTable();
                        }
                    });
                });

                // Manejo de sub-pestañas
                const subTabs = document.querySelectorAll('.sub-tab');

                subTabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        const parent = tab.closest('.main-tab-content');
                        const subTabsInParent = parent.querySelectorAll('.sub-tab');
                        const subTabContentsInParent = parent.querySelectorAll('.sub-tab-content');

                        subTabsInParent.forEach(t => t.classList.remove('active'));
                        subTabContentsInParent.forEach(c => c.classList.remove('active'));

                        tab.classList.add('active');
                        const subtabId = tab.getAttribute('data-subtab');
                        document.getElementById(`${subtabId}-content`).classList.add('active');

                        // Actualizar la vista cuando se cambia de sub-pestaña
                        if (parent.id === 'kumite') {
                            if (subtabId === 'bracket') {
                                generateKumiteBracket();
                            } else if (subtabId === 'competitors') {
                                updateKumiteCompetitorsTable();
                            }
                        } else {
                            if (subtabId === 'kata-bracket') {
                                generateKataBracket();
                            } else if (subtabId === 'kata-competitors') {
                                updateKataCompetitorsTable();
                            }
                        }
                    });
                });

                // Funciones para actualizar las vistas
                function updateKumiteGroups() {
                    const groupsContainer = document.getElementById('kumite-groups');
                    groupsContainer.innerHTML = '';

                    // Crear 8 grupos (A-H)
                    for (let i = 0; i < 8; i++) {
                        const groupLetter = String.fromCharCode(65 + i);
                        const groupCompetitors = kumiteCompetitors.filter(c => c.group === groupLetter);

                        const groupCard = document.createElement('div');
                        groupCard.className = 'group-card';

                        const groupHeader = document.createElement('div');
                        groupHeader.className = 'group-header';
                        groupHeader.textContent = `Grupo ${groupLetter}`;
                        groupCard.appendChild(groupHeader);

                        const table = document.createElement('table');
                        table.className = 'group-table';

                        // Cabecera de la tabla
                        const thead = document.createElement('thead');
                        thead.innerHTML = `
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dojo</th>
                    <th>V</th>
                    <th>D</th>
                    <th>Pts</th>
                    <th>Ippon</th>
                </tr>
            `;
                        table.appendChild(thead);

                        // Cuerpo de la tabla
                        const tbody = document.createElement('tbody');

                        groupCompetitors.sort((a, b) => a.position - b.position).forEach((competitor, index) => {
                            const row = document.createElement('tr');
                            if (index < 2) row.classList.add('qualified');

                            row.innerHTML = `
                    <td>${competitor.position}</td>
                    <td>
                        <div class="competitor-info">
                            <div class="belt" style="background-color: ${competitor.belt.color};"></div>
                            ${competitor.name}
                        </div>
                    </td>
                    <td> ${competitor.country.code.toUpperCase()}</td>
                    <td>${competitor.stats.wins}</td>
                    <td>${competitor.stats.losses}</td>
                    <td>${competitor.stats.wins * 3}</td>
                    <td>${competitor.stats.ippon}</td>
                `;

                            // Hacer clickable para ver perfil
                            row.addEventListener('click', () => showCompetitorProfile(competitor, 'kumite'));
                            tbody.appendChild(row);
                        });

                        table.appendChild(tbody);
                        groupCard.appendChild(table);
                        groupsContainer.appendChild(groupCard);
                    }
                }

                function generateKumiteBracket() {
                    const bracketElement = document.getElementById('kumite-bracket');
                    bracketElement.innerHTML = '';

                    // Fases eliminatorias
                    const rounds = [
                        { name: 'Octavos de Final', matches: 8 },
                        { name: 'Cuartos de Final', matches: 4 },
                        { name: 'Semifinales', matches: 2 },
                        { name: 'Final', matches: 1 },
                        { name: 'Tercer Puesto', matches: 1 }
                    ];

                    rounds.forEach(round => {
                        const roundDiv = document.createElement('div');
                        roundDiv.className = 'round';

                        const roundTitle = document.createElement('div');
                        roundTitle.className = 'round-title';
                        roundTitle.textContent = round.name;
                        roundDiv.appendChild(roundTitle);

                        for (let i = 0; i < round.matches; i++) {
                            const matchDiv = document.createElement('div');
                            matchDiv.className = 'match';

                            // Tatami aleatorio
                            const tatamiNum = Math.floor(Math.random() * 5) + 1;
                            const isRedTatami = Math.random() > 0.5;

                            const tatamiInfo = document.createElement('div');
                            tatamiInfo.className = `tatami-info ${isRedTatami ? 'tatami-red' : ''}`;
                            tatamiInfo.textContent = `Tatami ${tatamiNum}`;

                            // Competidores (simulados)
                            const comp1 = getRandomCompetitor(kumiteCompetitors);
                            const comp2 = getRandomCompetitor(kumiteCompetitors);

                            // Competidor 1
                            const comp1Div = document.createElement('div');
                            comp1Div.className = 'competitor';

                            const comp1Info = document.createElement('div');
                            comp1Info.className = 'competitor-info';
                            comp1Info.innerHTML = `
                    <div class="belt" style="background-color: ${comp1.belt.color};"></div>
                    ${comp1.name}
                `;

                            const score1 = document.createElement('div');
                            score1.className = 'score';

                            // Puntos WKF aleatorios
                            const ippon1 = round.name === 'Final' ? Math.floor(Math.random() * 2) : 0;
                            const wazari1 = Math.floor(Math.random() * 2);
                            const yuko1 = Math.floor(Math.random() * 3);

                            if (ippon1 > 0) {
                                score1.innerHTML = `<span class="ippon">${ippon1} Ippon</span>`;
                            } else if (wazari1 > 0) {
                                score1.innerHTML = `<span class="wazari">${wazari1} Waza-ari</span>`;
                            } else if (yuko1 > 0) {
                                score1.innerHTML = `<span class="yuko">${yuko1} Yuko</span>`;
                            }

                            comp1Div.appendChild(comp1Info);
                            comp1Div.appendChild(score1);

                            // Competidor 2
                            const comp2Div = document.createElement('div');
                            comp2Div.className = 'competitor';

                            const comp2Info = document.createElement('div');
                            comp2Info.className = 'competitor-info';
                            comp2Info.innerHTML = `
                    <div class="belt" style="background-color: ${comp2.belt.color};"></div>
                    ${comp2.name}
                `;

                            const score2 = document.createElement('div');
                            score2.className = 'score';

                            const ippon2 = round.name === 'Final' ? Math.floor(Math.random() * 2) : 0;
                            const wazari2 = Math.floor(Math.random() * 2);
                            const yuko2 = Math.floor(Math.random() * 3);

                            if (ippon2 > 0) {
                                score2.innerHTML = `<span class="ippon">${ippon2} Ippon</span>`;
                            } else if (wazari2 > 0) {
                                score2.innerHTML = `<span class="wazari">${wazari2} Waza-ari</span>`;
                            } else if (yuko2 > 0) {
                                score2.innerHTML = `<span class="yuko">${yuko2} Yuko</span>`;
                            }

                            comp2Div.appendChild(comp2Info);
                            comp2Div.appendChild(score2);

                            // Detalles del match
                            const matchDetails = document.createElement('div');
                            matchDetails.className = 'match-details';

                            const total1 = (ippon1 * 3) + (wazari1 * 2) + (yuko1 * 1);
                            const total2 = (ippon2 * 3) + (wazari2 * 2) + (yuko2 * 1);

                            // Determinar ganador
                            if (total1 > total2) {
                                comp1Div.classList.add('winner');
                            } else if (total2 > total1) {
                                comp2Div.classList.add('winner');
                            } else {
                                // Empate - decidir por Hantei
                                const winner = Math.random() > 0.5 ? comp1Div : comp2Div;
                                winner.classList.add('winner');
                                winner.querySelector('.score').textContent += " (H)";
                            }

                            matchDetails.textContent = `Puntos: ${total1}-${total2} | Técnica destacada: ${techniques[Math.floor(Math.random() * techniques.length)].name}`;

                            matchDiv.appendChild(tatamiInfo);
                            matchDiv.appendChild(comp1Div);
                            matchDiv.appendChild(comp2Div);
                            matchDiv.appendChild(matchDetails);
                            roundDiv.appendChild(matchDiv);
                        }

                        bracketElement.appendChild(roundDiv);
                    });
                }

                function updateKumiteCompetitorsTable() {
                    const tableBody = document.querySelector('#kumite-competitors-table tbody');
                    tableBody.innerHTML = '';

                    kumiteCompetitors.sort((a, b) => {
                        // Ordenar por grupo y luego por posición
                        if (a.group === b.group) {
                            return a.position - b.position;
                        }
                        return a.group.localeCompare(b.group);
                    }).forEach(competitor => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                <td>${competitor.id}</td>
                <td>
                    <div class="competitor-info">
                        <div class="belt" style="background-color: ${competitor.belt.color};"></div>
                        ${competitor.name}
                    </div>
                </td>
                <td>${competitor.group}</td>
                <td>${competitor.age}</td>
                <td>${competitor.belt.name}</td>
                <td>${competitor.stats.wins}</td>
                <td>
                    <span class="point-badge badge-ippon">${competitor.stats.ippon} I</span>
                    <span class="point-badge badge-wazari">${competitor.stats.wazari} W</span>
                    <span class="point-badge badge-yuko">${competitor.stats.yuko} Y</span>
                </td>
                <td>${competitor.position}°</td>
            `;

                        row.addEventListener('click', () => showCompetitorProfile(competitor, 'kumite'));
                        tableBody.appendChild(row);
                    });
                }

                function showCompetitorProfile(competitor, type) {
                    const profileContainer = type === 'kumite'
                        ? document.getElementById('kumite-profile')
                        : document.getElementById('kata-profile');

                    profileContainer.innerHTML = '';

                    const profileCard = document.createElement('div');
                    profileCard.className = 'profile-card';

                    // Encabezado del perfil
                    const profileHeader = document.createElement('div');
                    profileHeader.className = 'profile-header';
                    profileHeader.innerHTML = `
            <div class="belt-large" style="background-color: ${competitor.belt.color};"></div>
            <h3>${competitor.name} </h3>
        `;

                    // Cuerpo del perfil
                    const profileBody = document.createElement('div');
                    profileBody.className = 'profile-body';

                    const discipline = type === 'kumite' ? 'Kumite' : 'Kata';
                    const category = type === 'kumite'
                        ? `${document.getElementById('kumite-weight').value} kg`
                        : document.getElementById('kata-gender').value;

                    profileBody.innerHTML = `
            <div class="profile-row">
                <div class="profile-label">Disciplina:</div>
                <div>${discipline} - ${category}</div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Edad:</div>
                <div>${competitor.age} años</div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Cinta:</div>
                <div>${competitor.belt.name}</div>
            </div>
            <div class="profile-row">
                <div class="profile-label">País:</div>
                <div>${competitor.country.name}</div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Grupo:</div>
                <div>${competitor.group}</div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Posición:</div>
                <div>${competitor.position}° lugar</div>
            </div>
        `;

                    // Estadísticas específicas
                    const statsSection = document.createElement('div');
                    statsSection.className = 'point-stats';

                    if (type === 'kumite') {
                        const totalMatches = competitor.stats.wins + competitor.stats.losses;
                        const winPercentage = totalMatches > 0
                            ? Math.round((competitor.stats.wins / totalMatches) * 100)
                            : 0;

                        const totalPoints = (competitor.stats.ippon * 3) + (competitor.stats.wazari * 2) + (competitor.stats.yuko * 1);
                        const totalTechniques = competitor.stats.ippon + competitor.stats.wazari + competitor.stats.yuko;

                        statsSection.innerHTML = `
                <h4>Estadísticas de Kumite</h4>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">${competitor.stats.wins}</div>
                        <div class="stat-label">Victorias</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">${totalPoints}</div>
                        <div class="stat-label">Puntos WKF</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">${winPercentage}%</div>
                        <div class="stat-label">Efectividad</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">${totalTechniques}</div>
                        <div class="stat-label">Técnicas</div>
                    </div>
                </div>
                
                <h4>Distribución de Puntos</h4>
                <div class="point-row">
                    <div class="point-label">Ippon (3 pts)</div>
                    <div class="point-bar">
                        <div class="point-progress" style="width: ${totalTechniques > 0 ? (competitor.stats.ippon / totalTechniques * 100) : 0}%"></div>
                    </div>
                    <div class="point-count">${competitor.stats.ippon}</div>
                </div>
                <div class="point-row">
                    <div class="point-label">Waza-ari (2 pts)</div>
                    <div class="point-bar">
                        <div class="point-progress" style="width: ${totalTechniques > 0 ? (competitor.stats.wazari / totalTechniques * 100) : 0}%"></div>
                    </div>
                    <div class="point-count">${competitor.stats.wazari}</div>
                </div>
                <div class="point-row">
                    <div class="point-label">Yuko (1 pt)</div>
                    <div class="point-bar">
                        <div class="point-progress" style="width: ${totalTechniques > 0 ? (competitor.stats.yuko / totalTechniques * 100) : 0}%"></div>
                    </div>
                    <div class="point-count">${competitor.stats.yuko}</div>
                </div>
                
                <div class="profile-row" style="margin-top: 1rem;">
                    <div class="profile-label">Técnica favorita:</div>
                    <div>${competitor.stats.favoriteTechnique}</div>
                </div>
            `;
                    } else {
                        const averageScore = (7.5 + Math.random() * 1.5).toFixed(1);

                        statsSection.innerHTML = `
                <h4>Estadísticas de Kata</h4>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-value">${competitor.stats.wins}</div>
                        <div class="stat-label">Victorias</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">${averageScore}</div>
                        <div class="stat-label">Puntaje avg.</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">${Math.round(competitor.stats.wins / (competitor.stats.wins + competitor.stats.losses) * 100)}%</div>
                        <div class="stat-label">Efectividad</div>
                    </div>
                </div>
                
                <div class="profile-row">
                    <div class="profile-label">Kata favorito:</div>
                    <div>${competitor.stats.favoriteKata}</div>
                </div>
                
                <div class="profile-row">
                    <div class="profile-label">Estilo:</div>
                    <div>Shotokan</div>
                </div>
            `;
                    }

                    profileBody.appendChild(statsSection);
                    profileCard.appendChild(profileHeader);
                    profileCard.appendChild(profileBody);
                    profileContainer.appendChild(profileCard);

                    // Desplazarse a la sección de perfil
                    profileContainer.scrollIntoView({ behavior: 'smooth' });
                }

                // Funciones para Kata (similares a Kumite)
                function updateKataGroups() {
                    const groupsContainer = document.getElementById('kata-groups');
                    groupsContainer.innerHTML = '';

                    for (let i = 0; i < 8; i++) {
                        const groupLetter = String.fromCharCode(65 + i);
                        const groupCompetitors = kataCompetitors.filter(c => c.group === groupLetter);

                        const groupCard = document.createElement('div');
                        groupCard.className = 'group-card';

                        const groupHeader = document.createElement('div');
                        groupHeader.className = 'group-header';
                        groupHeader.textContent = `Grupo ${groupLetter}`;
                        groupCard.appendChild(groupHeader);

                        const table = document.createElement('table');
                        table.className = 'group-table';

                        const thead = document.createElement('thead');
                        thead.innerHTML = `
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Dojo</th>
                    <th>Punt.</th>
                    <th>Kata</th>
                    <th>V</th>
                </tr>
            `;
                        table.appendChild(thead);

                        const tbody = document.createElement('tbody');

                        groupCompetitors.sort((a, b) => a.position - b.position).forEach((competitor, index) => {
                            const row = document.createElement('tr');
                            if (index < 2) row.classList.add('qualified');

                            row.innerHTML = `
                    <td>${competitor.position}</td>
                    <td>
                        <div class="competitor-info">
                            <div class="belt" style="background-color: ${competitor.belt.color};"></div>
                            ${competitor.name}
                        </div>
                    </td>
                    <td> ${competitor.country.code.toUpperCase()}</td>
                    <td>${(7.5 + Math.random() * 1.5).toFixed(1)}</td>
                    <td>${competitor.stats.favoriteKata}</td>
                    <td>${competitor.stats.wins}</td>
                `;

                            row.addEventListener('click', () => showCompetitorProfile(competitor, 'kata'));
                            tbody.appendChild(row);
                        });

                        table.appendChild(tbody);
                        groupCard.appendChild(table);
                        groupsContainer.appendChild(groupCard);
                    }
                }

                function generateKataBracket() {
                    const bracketElement = document.getElementById('kata-bracket');
                    bracketElement.innerHTML = '';

                    const rounds = [
                        { name: 'Octavos de Final', matches: 8 },
                        { name: 'Cuartos de Final', matches: 4 },
                        { name: 'Semifinales', matches: 2 },
                        { name: 'Final', matches: 1 },
                        { name: 'Tercer Puesto', matches: 1 }
                    ];

                    rounds.forEach(round => {
                        const roundDiv = document.createElement('div');
                        roundDiv.className = 'round';

                        const roundTitle = document.createElement('div');
                        roundTitle.className = 'round-title';
                        roundTitle.textContent = round.name;
                        roundDiv.appendChild(roundTitle);

                        for (let i = 0; i < round.matches; i++) {
                            const matchDiv = document.createElement('div');
                            matchDiv.className = 'match';

                            const tatamiNum = Math.floor(Math.random() * 5) + 1;
                            const tatamiInfo = document.createElement('div');
                            tatamiInfo.className = 'tatami-info';
                            tatamiInfo.textContent = `Tatami ${tatamiNum}`;

                            const comp1 = getRandomCompetitor(kataCompetitors);
                            const comp2 = getRandomCompetitor(kataCompetitors);

                            // Competidor 1
                            const comp1Div = document.createElement('div');
                            comp1Div.className = 'competitor';

                            const comp1Info = document.createElement('div');
                            comp1Info.className = 'competitor-info';
                            comp1Info.innerHTML = `
                    <div class="belt" style="background-color: ${comp1.belt.color};"></div>
                    ${comp1.name} 
                `;

                            const score1 = document.createElement('div');
                            score1.className = 'score';
                            const scoreVal1 = (7.5 + Math.random() * 1.5).toFixed(1);
                            score1.textContent = scoreVal1;

                            comp1Div.appendChild(comp1Info);
                            comp1Div.appendChild(score1);

                            // Competidor 2
                            const comp2Div = document.createElement('div');
                            comp2Div.className = 'competitor';

                            const comp2Info = document.createElement('div');
                            comp2Info.className = 'competitor-info';
                            comp2Info.innerHTML = `
                    <div class="belt" style="background-color: ${comp2.belt.color};"></div>
                    ${comp2.name} 
                `;

                            const score2 = document.createElement('div');
                            score2.className = 'score';
                            const scoreVal2 = (7.5 + Math.random() * 1.5).toFixed(1);
                            score2.textContent = scoreVal2;

                            comp2Div.appendChild(comp2Info);
                            comp2Div.appendChild(score2);

                            // Detalles del match
                            const matchDetails = document.createElement('div');
                            matchDetails.className = 'match-details';

                            const kata1 = katas[Math.floor(Math.random() * katas.length)];
                            const kata2 = katas[Math.floor(Math.random() * katas.length)];

                            // Determinar ganador
                            if (parseFloat(scoreVal1) > parseFloat(scoreVal2)) {
                                comp1Div.classList.add('winner');
                            } else {
                                comp2Div.classList.add('winner');
                            }

                            matchDetails.textContent = `Katas: ${kata1} vs ${kata2} | Diferencia: ${Math.abs(parseFloat(scoreVal1) - parseFloat(scoreVal2)).toFixed(1)}`;

                            matchDiv.appendChild(tatamiInfo);
                            matchDiv.appendChild(comp1Div);
                            matchDiv.appendChild(comp2Div);
                            matchDiv.appendChild(matchDetails);
                            roundDiv.appendChild(matchDiv);
                        }

                        bracketElement.appendChild(roundDiv);
                    });
                }

                function updateKataCompetitorsTable() {
                    const tableBody = document.querySelector('#kata-competitors-table tbody');
                    tableBody.innerHTML = '';

                    kataCompetitors.sort((a, b) => {
                        if (a.group === b.group) {
                            return a.position - b.position;
                        }
                        return a.group.localeCompare(b.group);
                    }).forEach(competitor => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                <td>${competitor.id}</td>
                <td>
                    <div class="competitor-info">
                        <div class="belt" style="background-color: ${competitor.belt.color};"></div>
                        ${competitor.name}
                    </div>
                </td>
                <td> ${competitor.country.code.toUpperCase()}</td>
                <td>${competitor.group}</td>
                <td>${competitor.age}</td>
                <td>${competitor.belt.name}</td>
                <td>${(7.5 + Math.random() * 1.5).toFixed(1)}</td>
                <td>${competitor.stats.favoriteKata}</td>
                <td>${competitor.position}°</td>
            `;

                        row.addEventListener('click', () => showCompetitorProfile(competitor, 'kata'));
                        tableBody.appendChild(row);
                    });
                }

                // Funciones auxiliares
                function getRandomName() {
                    const firstNames = ['Juan', 'Carlos', 'Luis', 'Pedro', 'Miguel', 'Ana', 'María', 'Sofía', 'Laura', 'Elena'];
                    const lastNames = ['Pérez', 'Gómez', 'Rodríguez', 'López', 'Martínez', 'García', 'Hernández', 'Díaz', 'Sánchez', 'Ruiz'];
                    return `${firstNames[Math.floor(Math.random() * firstNames.length)]} ${lastNames[Math.floor(Math.random() * lastNames.length)]}`;
                }

                function getRandomCompetitor(competitors) {
                    return competitors[Math.floor(Math.random() * competitors.length)];
                }

                // Inicialización
                updateKumiteGroups();
                updateKumiteCompetitorsTable();
                updateKataGroups();
                updateKataCompetitorsTable();

                // Mostrar perfil del primer competidor de kumite por defecto
                if (kumiteCompetitors.length > 0) {
                    showCompetitorProfile(kumiteCompetitors[0], 'kumite');
                }

                // Manejo de filtros
                document.getElementById('kumite-filter').addEventListener('click', function () {
                    updateKumiteGroups();
                    updateKumiteCompetitorsTable();

                    // Actualizar perfil mostrado si es necesario
                    const currentProfile = document.querySelector('#kumite-profile .profile-card');
                    if (!currentProfile) {
                        showCompetitorProfile(kumiteCompetitors[0], 'kumite');
                    }
                });

                document.getElementById('kata-filter').addEventListener('click', function () {
                    updateKataGroups();
                    updateKataCompetitorsTable();

                    const currentProfile = document.querySelector('#kata-profile .profile-card');
                    if (!currentProfile) {
                        showCompetitorProfile(kataCompetitors[0], 'kata');
                    }
                });

                // Búsqueda de competidores
                document.getElementById('kumite-search-btn').addEventListener('click', function () {
                    const searchTerm = document.getElementById('kumite-search').value.toLowerCase();
                    if (searchTerm) {
                        const found = kumiteCompetitors.find(c =>
                            c.name.toLowerCase().includes(searchTerm) ||
                            c.country.name.toLowerCase().includes(searchTerm) ||
                            c.group.toLowerCase() === searchTerm
                        );

                        if (found) {
                            showCompetitorProfile(found, 'kumite');
                        } else {
                            alert('No se encontraron competidores que coincidan con la búsqueda');
                        }
                    }
                });

                document.getElementById('kata-search-btn').addEventListener('click', function () {
                    const searchTerm = document.getElementById('kata-search').value.toLowerCase();
                    if (searchTerm) {
                        const found = kataCompetitors.find(c =>
                            c.name.toLowerCase().includes(searchTerm) ||
                            c.country.name.toLowerCase().includes(searchTerm) ||
                            c.group.toLowerCase() === searchTerm
                        );

                        if (found) {
                            showCompetitorProfile(found, 'kata');
                        } else {
                            alert('No se encontraron competidores que coincidan con la búsqueda');
                        }
                    }
                });
            });
        </script>
        </body>

        </html>

        <!--===================================================-->
        <!--End page content-->

    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
    </div>
</x-app-layout>