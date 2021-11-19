<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/styles.css">
   
    <title> @yield('title') </title>

    {{-- fonte do google --}}

    
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    {{-- Css do bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    {{-- Css da aplicação --}}
    <script src="/js/scripts.js"></script>


</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/eventos/criar" class="nav-link">Criar eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Cadastrar</a>
                    </li>
                   
                    {{-- <li class="nav-item">
                        <a href="/contato" class="nav-link">Contato</a>
                    </li>
                     --}}
                </ul>
            </div>
        </nav>
    </header>
    {{-- conteudo das páginas, layout principal --}}

    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('msg'))
                     <p class="msg">{{ session('msg') }}</p>
                @endif
                
                @yield('content')
            </div>
        </div>
    </main>
   
    

    
    
    
    <footer>
        <p>Laravel bolado &copy; 2021</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html> 