<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        /* Estilos generales para la tabla */
        .table-container {
             max-width: 600px;
             margin: 0 auto;
         }

         /* Estilos para las celdas del encabezado */
         th.table-active {
             background-color: #B0E5EC; /* Color de fondo para el encabezado activo */
             width: 200px;
         }

         /* Estilos para las celdas de datos */
         td.text-start {
             text-align: left; /* Alinear texto a la izquierda */
         }

         /* Estilos para la tabla en sí */
         .table {
             width: 100%;
             border-collapse: collapse;
         }
        /* Estilos para las filas pares */
        tr:nth-child(even) {
             background-color: #ffb224; /* Color de fondo para las filas pares */
         }

         /* Estilos para las filas impares */
         tr:nth-child(odd) {
             background-color: #ffb224; /* Color de fondo para las filas impares */
         }

         </style>

<div>
<img src="img/logo.png" class="rounded mx-auto d-block" style="width: 100px; height: 100px;">
</div>
    <br>
    <br>

    <p class="text-end">Santa Cruz Xoxocotlán Oaxaca, Oax</p>
    <p class="text-end"><strong>Tipo de Solicitud:</strong>  {{ $selectedRequest->request_type }}</p>
    <p class="text-end"><strong>Folio de Solicitud:</strong>  {{ $selectedRequest->requestfolio }}</p>
    <p class="text-start"> <strong>{{ $selectedRequest->institution_name }}</strong></p>
    <p class="text-start"> <strong>P R E S E N T E:</strong></p>
    <section>
        <p style="text-indent: 40px; text-align: justify;">
            El que suscribe <strong>C. {{ $userDetails->personalname }} {{ $userDetails->paternallastname }} {{ $userDetails->maternalastname }}</strong> Sollicito de la manera mas cordial me puedan apoyar con;<strong> {{ $selectedRequest->request_description }}</strong> proporciono los siguientes datos para una mejor valoracion de la peticion.
        </p>

    </section>

<section>
<div class="table-container">
    <h2>Datos Personales</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th class="table-active text-start">Correo Electrónico:</th>
                    <td class="text-start">{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="table-active text-start">CURP:</th>
                    <td class="text-start">{{ $userDetails->curp }}</td>
                </tr>
                <tr>
                    <th class="table-active text-start">Género:</th>
                    <td class="text-start">{{ $userDetails->gender }}</td>
                </tr>
                <tr>
                    <th class="table-active text-start">Número Telefónico:</th>
                    <td class="text-start">{{ $userDetails->cellphonenumber }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</section>
<section>
    <div class="table-container">
        <h2>Datos de Domicilio </h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="table-active text-start">Código Postal:</th>
                        <td class="text-start">{{ $addressData->postalcode }}</td>
                    </tr>
                    <tr>
                        <th class="table-active text-start">Municipio :</th>
                        <td class="text-start">{{ $addressData->municipality }}</td>
                    </tr>
                    <tr>
                        <th class="table-active text-start">Colonia:</th>
                        <td class="text-start">{{ $addressData->colony }}</td>
                    </tr>
                    <tr>
                        <th class="table-active text-start">Calle:</th>
                        <td class="text-start">{{ $addressData->street }}</td>
                    </tr>
                    <tr>
                        <th class="table-active text-start">Número Exterior e Interior:</th>
                        <td class="text-start">{{ $addressData->outdoornumber }} / {{ $addressData->interiornumber }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </section>
    <section>
        <div class="table-container">
            <h2>Datos Médicos </h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="table-active text-start">Diagnóstico Médicol:</th>
                            <td class="text-start">{{ $medicalData->medicaldiagnosis }}</td>
                        </tr>
                        <tr>
                            <th class="table-active text-start">Tipo de Sangre :</th>
                            <td class="text-start">{{ $medicalData->blood_type }}</td>
                        </tr>
                        <tr>
                            <th class="table-active text-start">Alergias:</th>
                            <td class="text-start">
                                @empty($medicalData->allergies)
                                    ninguno
                                @else
                                    {{ $medicalData->allergies }}
                                @endempty
                            </td>
                        </tr>
                        <tr>
                            <th class="table-active text-start">Consideraciones Médicas Adicionales:</th>
                            <td class="text-start">
                                @empty($medicalData->additionaldescription)
                                    ninguno
                                @else
                                    {{ $medicalData->additionaldescription }}
                                @endempty
                            </td>
                        </tr>
                        <tr>
                            <th class="table-active text-start">Enfermedad Crónica</th>
                            <td class="text-start">
                                @empty($medicalData->chronic_diseases)
                                    ninguno
                                @else
                                    {{ $medicalData->chronic_diseases }}
                                @endempty
                            </td>
                        </tr>

                       </tbody>
                </table>
            </div>
        </div>
        </section>
<section>
    <p class="text-start" style="text-indent: 20px;">Sin nada más que agregar y esperando con su apoyo se despide ne despido de ustedes  enviándoles un cordial Saludo.</p>


</section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
