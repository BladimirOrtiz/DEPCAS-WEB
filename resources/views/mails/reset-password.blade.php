<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar Contraseña</title>

    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/564x/4e/64/f4/4e64f4fd7d5b63de519cf9f7fee24a88.jpg">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="{{ asset('js/menu.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <<h1>Recuperar contraseña</h1>
    <p>Hemos recibido una solicitud para restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:</p>
    <a href="{{ route('password.reset', ['token' => $token]) }}">Restablecer contraseña</a>
    <p>Si no has solicitado el restablecimiento de contraseña, no te preocupes, simplemente ignora este correo electrónico.</p>
</body>



 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
 </html>
