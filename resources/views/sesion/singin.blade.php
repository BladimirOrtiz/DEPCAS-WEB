<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/564x/a6/65/26/a6652603c3ac7b1c2392274913efb673.jpg">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
     <div class= "container d-flex">
     <form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form ">
        @csrf
                <h2 class="text-center">Iniciar Sesión</h2>
                <div class="text-center">
                    <img src="img/logo.png" class="rounded" id="logo" alt="">
                </div>
              <div class="form-group"> <!-- User Name -->
                <label for="exampleInputName" class="control-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="user_name" name="username" placeholder="Usuario/Email">
                @error('user_name')
                <small class="txt-danger mt-1">
                 <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <div class="form-group"> <!-- Password  -->
                <label for="full_name_id" class="control-label">Contraseña</label>
                <input type="password" class="form-control" id="email_address" name="password" placeholder="Contraseña">
                @error('password')
                <small class="txt-danger mt-1">
                 <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <br>
            <a href="/registrar" class="text-body">¡Registrate ya!</a>
            <a href="/recuperarcont" class="text-body" style="float:right;">¿Olvidaste tu contraseña?</a>
            <br>
            <br>
            <div id="btnrg">
                <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>

              </div>

              <div class="container">
                @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Resto del contenido de la página -->
            </div>
        <script>
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 5000);
        </script>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
