<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro del usuario</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/564x/4e/64/f4/4e64f4fd7d5b63de519cf9f7fee24a88.jpg">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
     <div class= "container d-flex">
     <form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form ">
        @csrf
                <h2 class="text-center">REGISTRO DE USUARIO</h2>
              <div class="form-group"> <!-- User Name -->
                <label for="exampleInputName" class="control-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="user_name" name="username" placeholder="Nombre de Usuario">
                @error('user_name')
                <small class="txt-danger mt-1">
                 <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <div class="form-group"> <!-- Email Address -->
                <label for="full_name_id" class="control-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email_address" name="email" placeholder="Correo Electrónico">
                @error('email')
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
            <div class="form-group"> <!-- Password Confirm  -->
                <label for="full_name_id" class="control-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="email_address" name="password_confirm" placeholder="Confirmar Contraseña">
                @error('password_confirm')
                <small class="txt-danger mt-1">
                 <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>
            <br>
            <div id="btnrg">
                <button type="submit" class="btn btn-primary btn-lg">Registrarme</button>
              </div>
            <br>
               <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start" >
                <h2>Registrate con:</h2>
                <button  type="button" style=" background-color: transparent;"><img src="img/iconof.png" alt="" ></button>
                <button  type="button" style=" background-color: transparent;"><img src="img/iconog.png"  alt="" ></button>
            </div>



        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
