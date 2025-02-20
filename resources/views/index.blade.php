<!-- resources/views/index.blade.php -->
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $titulo ?? 'Bibeep' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Bibeep.com</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link text-white" href="{{ route('produtos.index') }}">Cadastrar</a>
                    <a class="nav-link text-white" href="{{ route('sobre') }}">Sobre</a>
                    <a class="nav-link text-white" >Login</a>
                </nav>
            </div>
        </header>
        <br>
        <br>
        <br>
        <br>

        <main class="px-3">
            <h1>Bibeep - Seu leitor de código de barras</h1>
            <p class="lead">Digite o código de barras do produto e deixe que nós calculamos e mostramos tudo para você!</p>
            <p class="lead">
                <a>Learn more</a>
                <img src="{{ asset('img/codigodebarras.png') }}" alt="Código de barras">
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/" class="text-white">@Lauany & Murilo</a>.</p>
        </footer>
    </div>
</body>
</html>
