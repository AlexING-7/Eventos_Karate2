<x-app-layout>

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">

                <div class="pad-all text-center">
                    <h3>Torneo Oficial Grupos</h3>
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
                        @livewire('grupos', ['competencia' => $competencia, 'grupos' => $grupos])

        </body>

        </html>

        <!--===================================================-->
        <!--End page content-->

    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
    </div>
</x-app-layout>