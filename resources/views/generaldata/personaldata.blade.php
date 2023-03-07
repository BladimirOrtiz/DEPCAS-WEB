<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos Generales</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/564x/4e/64/f4/4e64f4fd7d5b63de519cf9f7fee24a88.jpg">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="{{ asset('js/menu.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos Personales</title>
</head>
<body>

@auth
<nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #3d0dc0;">
  <!--BARRA DE NAVEGACION -->

<ul id="mn" class="nav nav-pills">
  <a class="navbar-brand" href="index.html"
      ><img src="https://i.pinimg.com/564x/4e/64/f4/4e64f4fd7d5b63de519cf9f7fee24a88.jpg" class="logo" alt="DEPCASWEB"></a>
      <ul id="menu">
              <li><a href="">{{ auth()->user()->name ?? auth()->user()->username}}</a>
          <ul>
            <li><a href="/logout">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
</nav>
<div class= "container d-flex">
<form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form ">
    @csrf
            <h2 class="text-center">REGISTRO DE DATOS PERSONALES</h2>
          <div class="form-group"> <!-- Personal Name -->
            <label for="exampleInputName" class="control-label">Nombre Personal</label>
            <input type="text" class="form-control" id="personalname" name="personalname" placeholder="Nombre Personal">
            @error('personalname')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group"> <!-- Paternal lastname -->
            <label for="full_name_id" class="control-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="paternallastname" name="paternallastname" placeholder="Apellido Paterno">
            @error('paternallastname')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group"> <!-- Maternal lastname -->
            <label for="full_name_id" class="control-label">Apellido Materno</label>
            <input type="text" class="form-control" id="maternalastname" name="maternalastname" placeholder="Apellido Paterno">
            @error('maternalastname')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group"> <!-- Birth Date -->
            <label for="full_name_id" class="control-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="dia/mes/año">
            @error('birthdate')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group"> <!-- CURP -->
            <label for="full_name_id" class="control-label">CURP</label>
            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP">
            @error('email')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group"> <!-- CURP -->
            <label for="full_name_id" class="control-label">Genero</label>
            <select class="form-select" aria-label="Default select example" name="gender">
                <option selected>Selecciona</option>
                <option value="1">Hombre</option>
                <option value="2">Mujer</option>
              </select>
        </div>
        <div class="form-group"> <!-- Paternal lastname -->
            <label for="full_name_id" class="control-label">Telefono Movil</label>
            <input type="text" class="form-control" id="cellphonenumber" name="cellphonenumber" placeholder="Telefono Movil">
            @error('cellphonenumber')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <div class="form-group"> <!-- Maternal lastname -->
            <label for="full_name_id" class="control-label">Telefono de Casa</label>
            <input type="text" class="form-control" id="homenumber" name="homenumber" placeholder="Teléfono de casa">
            @error('email')
            <small class="txt-danger mt-1">
             <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
        <br>
        <br>
        <div id="btnrg">
            <button type="submit" class="btn btn-primary btn-lg">Siguiente</button>
          </div>
        </form>
    </div>
        <br>


@endauth
    @guest
    <h1>POR FAVOR INICIA SESION PARA SEGUIR CON TU REGISTRO<a href="/sesion">Iniciar Sesion</a></h1>
    @endguest

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
