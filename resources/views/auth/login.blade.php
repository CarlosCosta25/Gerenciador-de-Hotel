<html lang="pt-br">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/registrar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--<script>
        function togglePassword() {
        const passwordField = document.getElementById('password');
        const passwordFieldType = passwordField.getAttribute('type');
        passwordField.setAttribute('type', passwordFieldType === 'password' ? 'text' : 'password');
    }
    </script> -->

</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-2">
                <h3>LOGIN</h3>
                <form action="{{route('login.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" id="email"  :value="old('email')" name ="email"
                            placeholder="Seu email *" value="" />
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name ="password"
                            placeholder="Sua senha *" value="" />
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" class="btnRegister" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>

</html>
