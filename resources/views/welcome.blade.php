<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenida</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/564x/a6/65/26/a6652603c3ac7b1c2392274913efb673.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    <nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #3498db;">
        <!--BARRA DE NAVEGACION -->
        <ul id="mn" class="nav nav-pills">
          <a class="navbar-brand" href="index.html">
            <img src="https://i.pinimg.com/564x/a6/65/26/a6652603c3ac7b1c2392274913efb673.jpg" class="logo" alt="DPCASWEB">
          </a>
          </ul>
          <div class="ml-auto d-flex">
            <li class="nav-item" style="background-color: #f5f5f5; margin-right: 10px; padding: 10px; animation: fadein 2s;">
              <a class="nav-link" href="/sesion">
                <i class="fas fa-user"></i> Iniciar sesión
              </a>
            </li>
            <li class="nav-item" style="background-color: #f5f5f5; margin-right: 10px; padding: 10px; animation: fadein 2.5s;">
              <a class="nav-link" href="acerca.html">
                <i class="fas fa-info-circle"></i> Acerca de
              </a>
            </li>
          </div>
      </nav>

      <br>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="https://www.oaxaca.gob.mx/cecude/">
                <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="Imagen 1">
              </a>
            </div>
            <div class="carousel-item">
              <a href="https://icomexico.com/">
                <img src="https://live.staticflickr.com/3647/3661482468_ca8a1394b8_c.jpg" class="d-block w-100" alt="Imagen 2">
              </a>
            </div>
            <div class="carousel-item">
              <a href="https://www.voaxaca.tecnm.mx/">
                <img src="https://www.voaxaca.tecnm.mx/wp-content/themes/TecNM-ITVO/images/pleca-ITVO.png" class="d-block w-100" alt="Imagen 3">
              </a>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>

       <br>
       <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://www.oaxaca.gob.mx/cecude/wp-content/uploads/sites/36/2020/01/nalca%C3%B1_main.jpg" class="d-block w-100" alt="Imagen 1">
          </div>
          <div class="carousel-item">
            <img src="https://www.oaxaca.gob.mx/cecude/wp-content/uploads/sites/36/2020/01/cedem_main.jpg" class="d-block w-100" alt="Imagen 2">
          </div>
          <div class="carousel-item">
            <img src="https://www.oaxaca.gob.mx/cecude/wp-content/uploads/sites/36/2020/01/ca%C3%B1ada_main.jpg" class="d-block w-100" alt="Imagen 3">
          </div>
          <div class="carousel-item">
            <img src="https://www.oaxaca.gob.mx/cecude/wp-content/uploads/sites/36/2020/01/itu_main.jpg" class="d-block w-100" alt="Imagen 4">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
        <br>

         <br>
         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://sic.cultura.gob.mx/galeria_imagen/55355dad965934_taller_de_banda_y_guitarra.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
              <img src="https://sic.cultura.gob.mx/images/46329" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
              <img src="https://sic.cultura.gob.mx/galeria_imagen/55355cd5edd442_espacio_uno.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
            <div class="carousel-item">
              <img src="https://sic.cultura.gob.mx/galeria_imagen/574f20d717972Taller_de_Danza_CCHeberto_Castillo_San_Jacinto_Amilpas_11.jpg" class="d-block w-100" alt="Imagen 4">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
        <br>

         <br>
         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://escuelajamli.com.mx/wp-content/uploads/2020/08/JAMLI-Educacio%CC%81n-inclusiva.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
              <img src="https://www.ei-ie.org/image/03d34.jpg/lead.jpg" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
              <img src="https://educacioncontinua.udgvirtual.udg.mx/wp-content/uploads/2022/06/1820857097_Diplomado-para-monitores-de-la-inclusion-scaled.jpg" class="d-block w-100" alt="Imagen 3">
            </div>
            <div class="carousel-item">
              <img src="https://i0.wp.com/www.lucaedu.com/wp-content/uploads/2022/01/iStock-1328668131.jpg?resize=1080%2C608&ssl=1" class="d-block w-100" alt="Imagen 4">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
        <br>

          <br>
          <footer class="footer">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <img src="https://scontent.fmid1-3.fna.fbcdn.net/v/t39.30808-6/328248098_712314383727019_3805406242648634395_n.jpg?_nc_cat=100&cb=99be929b-3346023f&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGr55uhFWj9PoGx8MsLudtNr0bKR1TgXquvRspHVOBeq08Bh2Uz4UOdsHpx7Hpc0lgwz6CE9Vt3-NOiAk8Bg5GL&_nc_ohc=BzGgPq3uN5QAX98kCS8&_nc_ht=scontent.fmid1-3.fna&oh=00_AfBw_cI6ECZ_VRY5viHxt7Fi43yUGTgXo6gcLMo0Heavqw&oe=64A87219" alt="DIF Xoxocotlán">
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


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        var carousel = document.getElementById('carouselExampleIndicators');
        carousel.addEventListener('slid.bs.carousel', function(event) {
          if (event.relatedTarget.classList.contains('carousel-item-end')) {
            carousel.carousel(0); // Vuelve a la primera imagen
          }
        });
      </script>




</body>
</html>
