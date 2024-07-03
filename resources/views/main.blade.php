<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Luiz XIV</title>
    <!-- Inclua o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/botoes.css">
    <script type="text/javascript" src="{{asset('/javascript/mascara.js')}}"></script>
</head>

<body>

    <!-- Barra de Navegação -->
    <div class="navBar">

        <h1 class="tituloNavBar">Hotel Luiz XVI</h1>
        <!-- Imagem do Logo -->
        <img src="{{ asset('imagens/logo.png') }}" alt="Logo do Hotel" class="logoHotel">
        <!-- Dropdown Hospedes -->
        <a href="{{ route('hospedes.index') }}" class="navButton"><i class="bi bi-house"></i> Home</a>

        <!-- Dropdown Hospedes -->
        <div class="dropdown">
            <a href="{{ route('reservas.index') }}" class="dropdownButton"><i class="bi bi-journal-check"></i> Reservas</a>
            <div class="dropdown-content">
                <a href="{{ route('reservas.create') }}" class="navButton">Cadastrar</a>
                <!-- Adicione mais opções conforme necessário -->
            </div>
        </div>


        <div class="dropdown">
            <a href="{{ route('hospedes.index') }}" class="dropdownButton"><i class="bi bi-person-fill"></i> Hóspedes</a>
            <div class="dropdown-content">
                <a href="{{ route('hospedes.create') }}" class="navButton">Cadastrar</a>
                <!-- Adicione mais opções conforme necessário -->
            </div>
        </div>
        <div class="dropdown">
            <a href="{{ route('acomodacoes.index') }}" class="dropdownButton"><i class="bi bi-building"></i> Acomodações</a>
            <div class="dropdown-content">
                <a href="{{ route('acomodacoes.create') }}" class="navButton">Cadastrar</a>
                <!-- Adicione mais opções conforme necessário -->
            </div>
        </div>
    </div>

    <!-- Conteúdo -->
    <main class="conteudo">
        <div class="barra">
            <ul class="nav-list">
                <li class="nav-link">Configurações</li>
                <li class="nav-link">Usuario</li>
            </ul>
        </div>
        @yield('content')
    </main>
    <footer>
        <p class="info_rodape"> Criador por Carlos Eduardo da Costa &copy; 2024 </p>
    </footer>
    <!-- Inclua o Bootstrap JS e o Popper.js (necessário para dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
