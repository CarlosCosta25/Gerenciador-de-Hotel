<html lang="pt-br">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/registrar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script>
        function togglePassword() {
        const passwordField = document.getElementById('password');
        const passwordFieldType = passwordField.getAttribute('type');
        passwordField.setAttribute('type', passwordFieldType === 'password' ? 'text' : 'password');
    }
    </script>

</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-2">
                <h3>Cadastro de Usuário</h3>
                <form action="{{route('register')}}"method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="nome" name ="nome"
                            placeholder="Seu nome completo *" value="" required >
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name ="email"
                            placeholder="Seu email *" value="" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="usuario" name ="usuario"
                            placeholder="Seu usuário *" value="" />
                            <x-input-error :messages="$errors->get('usuario')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name ="password"
                            placeholder="Sua senha *" value="" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" class="btnRegister" value="Registrar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>

</html>
