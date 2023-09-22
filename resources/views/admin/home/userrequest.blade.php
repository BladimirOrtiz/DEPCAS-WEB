<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitudes de Usuario</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/564x/a6/65/26/a6652603c3ac7b1c2392274913efb673.jpg">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
     <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
     <link rel="stylesheet" href="{{ asset('css/readrequest.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<body>

    <nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #3498db;">
      <!--BARRA DE NAVEGACION -->

    <ul id="mn" class="nav nav-pills">
      <a class="navbar-brand" href="/welcomepanel"
          ><img src="https://i.pinimg.com/564x/a6/65/26/a6652603c3ac7b1c2392274913efb673.jpg" class="logo" alt="DEPCASWEB"></a>


          <ul id="menu">
            <li><a href="">Administrador</a>
                <ul>
                    <li><a href="/logoutadmin">Cerrar Sesión</a></li>
                </ul>
                <ul>
                    <li><a href="/logoutadmin">Configuración de la Cuenta</a></li>
                </ul>
            </li>
        </ul>
        </nav>
    <br>
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sidebar">
              <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link"  onclick="toggleCollapse('datosGenerales')">
                      <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="Imagen" width="50" height="50">
                     Solicitudes
                    </a>
                    <div class="collapse" id="datosGenerales">
                      <div class="collapse-content">
                        <ul class="list-unstyled">

                        </ul>
                      </div>
                    </div>
                  </li>


                  <li class="nav-item">
                    <a class="nav-link"  onclick="toggleCollapse('solicitudes')">
                      <img src="https://cdn-icons-png.flaticon.com/512/7257/7257795.png" alt="Imagen" width="50" height="50">
                       Respuestas
                      </a>

                  </li>
                  <li class="nav-item">
                    <a class="nav-link"  onclick="toggleCollapse('solicitudes')">
                      <img src="https://cdn-icons-png.flaticon.com/512/7257/7257795.png" alt="Imagen" width="50" height="50">
                       Estadisticas
                      </a>

                  </li>


              </ul>
            </div>
          </div>
          <div class="col-md-9 p-3 min-vh-100">
<!-- Contenido principal aquí -->
<h1>Tabla de Solicitudes</h1>
<div class="table-responsive">
    <table class="table custom-table">
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Folio de Solicitud</th>
                <th>Tipo de Solicitud</th>
                <th>Sector Destinado</th>
                <th>Institución</th>
                <th>Descripción</th>
                <th>Archivo Adjunto</th>
                <th>Fecha de Creación</th>
                <th>Hora de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->user->username }}</td>
                    <td>{{ $solicitud->requestfolio }}</td>
                    <td>{{ $solicitud->request_type }}</td>
                    <td>{{ $solicitud->sector_destined }}</td>
                    <td>{{ $solicitud->institution_name }}</td>
                    <td>{{ $solicitud->request_description }}</td>
                    <td>
                        @if ($solicitud->applicant_files)
                            <a href="{{ asset('storage/' . $solicitud->applicant_files) }}" target="_blank">
                                Ver Archivo
                            </a>
                        @else
                            No hay archivo adjunto
                        @endif
                    </td>
                    <td>{{ $solicitud->created_date }}</td>
                    <td>{{ $solicitud->creation_time }}</td>
                    <td>
                    <!-- Botones de Acción -->
                    <a href="{{ route('request.updaterequest', ['requestfolio' => $solicitud->requestfolio]) }}" class="btn btn-primary" title="Editar">
                        <img src="https://cdn-icons-png.flaticon.com/512/5464/5464742.png" alt="Imagen" width="50" height="50">
                    </a>

                    <form action="{{ route('request.deleterequest', ['requestfolio' => $solicitud->requestfolio]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="Eliminar">
                            <img src="https://cdn.icon-icons.com/icons2/1458/PNG/512/trashbinbutton_99658.png" alt="Imagen" width="50" height="50">
                        </button>
                    </form>

                    <a href="{{ route('generate.pdf', ['idrequest' => $solicitud->idrequest]) }}" class="btn btn-secondary" target="_blank" title="Generar PDF">
                    <img src="https://cdn-icons-png.flaticon.com/256/337/337946.png" alt="Imagen" width="50" height="50">
                    <a>
                    <a href="{{ route('send.email', ['idrequest' => $solicitud->idrequest]) }}" class="btn btn-dark" target="_blank" title="Envío vía Email">
                    <img src="https://cdn-icons-png.flaticon.com/512/2343/2343686.png" alt="Imagen" width="50" height="50">
                    </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
          </div>
        </div>
        </div>



      <script>
        // Función para desplegar y contraer al hacer clic
        function toggleCollapse(elementId) {
          var element = document.getElementById(elementId);
          var collapse = new bootstrap.Collapse(element);
          collapse.toggle();
        }
        function setActive(element) {
    var activeItems = document.getElementsByClassName("active");
    // Elimina la clase "active" de todos los elementos
    for (var i = 0; i < activeItems.length; i++) {
      activeItems[i].classList.remove("active");
    }
    // Agrega la clase "active" al elemento seleccionado
    element.classList.add("active");
  }
      </script>
          <br>
          <footer class="footer">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <img src="https://i.pinimg.com/564x/5e/2a/01/5e2a01d21a56b2f300e9331ed76efc74.jpg" alt="DIF Xoxocotlán">
                  </div>
                <div class="col-md-6">
                  <img src="data:image/jpeg;base64,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" alt="Logo Municipio Santa Cruz Xoxocotlán">
                </div>
              </div>
              <br>
              <div class="row mt-4">
                <div class="col-md-6">
                  <div class="social-icons">
                    <a href="https://www.facebook.com/DIFXoxocotlan/?locale=es_LA" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/XoxocotlanDIF" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                  </div>
                </div>
                <div class="col-md-6 text-md-right">
                  <p>&copy; 2023 Municipio de Santa Cruz Xoxocotlán. Todos los derechos reservados.</p>
                </div>
              </div>
            </div>
          </footer>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
