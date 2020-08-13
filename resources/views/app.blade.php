<!doctype html>
<html lang="ES-es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ComiGeo APP</title>
        <link rel="icon" href="/icon.png" type="image/x-icon">
        <link href="{{asset('css/appli.css')}}" rel="stylesheet">
    </head>
    <body>
            <div id="app" class="content"><!--La equita id debe ser app, como hemos visto en app.js-->
                <main-component />
            </div>
       <script src="{{asset('js/app.js')}}"></script><!-- Añadimos el js generado con webpack, donde se encuentra nuestro componente vuejs-->
</body>
</html>