<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComiGeo: Sistema de geolocalización de comisarias</title>
    <link rel="shortcut icon" href="/icon.png" type="image/x-icon">
    <link rel="icon" href="/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}"/>
</head>
<body>
    <div id="header">
        <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594699993/comigeo/ugvpuhf3xu8o3rvgaeii.svg" alt="logo-comigeo" width="210px" heigth="45px">
        <button id="button-header" class="button-landing header-button-hide">IR AL MAPA</button>
    </div>
    <div id="content">
        <div id="page-1">
            <div id="info-text">
                <div>
                    <div id="rectangle"></div>
                    <p>
                        Ubica geograficamente comisarias a nivel nacional y encuentra la mas cercana a tu ubicación. 
                    </p>
                </div>
                <button class="button-landing">
                    IR AL MAPA
                </button>
            </div>
            <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594699979/comigeo/qkpdnihzk5th7pigeeyi.svg" alt="person-map"width="534px" heigth="535px">
        </div>
        <div id="page-2">
            <h1>Denuncias por violencia familiar</h1>
            <p>En esta grafica se muestra la cantidad de denuncias por violencia familiar puesta cada mes por hombres y mujeres</p>
            <div>
                <div id="char"></div>
                <div id="data">
                    <h2>CIFRAS</h2>
                    <h6>Total de denuncias</h6>
                    <h1>250 000</h1>
                    <h6>Puestas por hombres</h6>
                    <h1>125 000</h1>
                    <h6>Puestas por mujeres</h6>
                    <h1>125 000</h1>
                </div> 
            </div>
        </div>
        <div id="page-3">
            <h1>&lt;Equipo de Desarrollo&gt;</h1>
            <div class="team">
                <div class="miembro-card">
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1586577289/hp8mig8x7rgfpafczh8d.jpg" alt="Brayan-photo" class="miembro-photo">
                    <p class="miembro-rol">Lider</p>
                    <h2>BRAYAN F. GUILLEN</h2>
                    <p>bguillenn@unsa.edu.pe</p>
                </div>
                <div class="miembro-card">
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594952354/roo5mkscrvp5kezwbkqb.jpg" alt="Jhonatan-Photo" class="miembro-photo">
                    <p class="miembro-rol">Pruebas</p>
                    <h2>JHONATAN J. ACUÑA</h2>
                    <p>jacuñah@unsa.edu.pe</p>
                </div>
                <div class="miembro-card">
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594949619/rwdp0fgvp3rt8nftusct.jpg" alt="Denis-Photo" class="miembro-photo">
                    <p class="miembro-rol">Analista</p>
                    <h2>DENIS A. LLAMOCA</h2>
                    <p>dllamocac@unsa.edu.pe</p>
                </div>
            </div>
            <div class="team">
                <div class="miembro-card">
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594949315/otez3hglpsv7fgxsahct.jpg" alt="Lizette-photo" class="miembro-photo">
                    <p class="miembro-rol">Diseñadora</p>
                    <h2>LIZETTE Q. FLORES</h2>
                    <p>lquispeflore@unsa.edu.pe</p>
                </div>
                <div class="miembro-card">
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594950725/mougr9cuew2f7ujmkhjb.jpg" alt="Arnold-Photo" class="miembro-photo">
                    <p class="miembro-rol">Desarrollador</p>
                    <h2>ARNOLD D. MOLLO</h2>
                    <p>amolloa@unsa.edu.pe</p>
                </div>
                <div class="miembro-card">
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1594952400/ghiuhovldwqonng4utio.jpg" alt="Jose-Photo" class="miembro-photo">
                    <p class="miembro-rol">Despliegue</p>
                    <h2>JOSE C. MEJIA</h2>
                    <p>jmejia@unsa.edu.pe</p>
                </div>
            </div>
            <h1>&lt;/Equipo de Desarrollo&gt;</h1>
        </div>
    </div>
    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>