<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('titulo')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        
        @auth
        <a class="navbar navbar-brand navbar-expand-lg" href="{{ route('series.index') }}">Home</a>
        <a href="/sair" class="text-danger">Sair</a>
        @endauth

        @guest
        <a class="navbar navbar-brand navbar-expand-lg" href="/entrar">Home</a>
        <a href="/entrar">Entrar</a>
        @endguest
        
        
    </nav>
        <div class="container">
            <div class="jumbotron">
                <h1>@yield('cabecalho')</h1>
            </div>
    
            @yield('conteudo')
        </div>
    </body>
</html>