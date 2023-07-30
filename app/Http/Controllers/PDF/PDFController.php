<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF; // O el namespace adecuado según la biblioteca que estés utilizando
use App\Models\User;
use App\Models\user_details;
use App\Models\Address_Data;
use App\Models\Medical_Data;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Part\TextPart;
use Illuminate\Support\Facades\Mail;
use App\Mail\FileAttachmentMail;
class PDFController extends Controller
{
    public function generatePDF(Request $request, $idrequest)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener el ID de la solicitud seleccionada desde el parámetro de la URL
        // Ya no es necesario obtenerlo con $request->input('idrequest') porque ahora lo pasamos como argumento en la ruta

        // Obtener la solicitud seleccionada por el ID
        $selectedRequest = Solicitud::getRequestByIdAndUser($idrequest, $userId);

        // Verificar si la solicitud existe antes de continuar
        if (!$selectedRequest) {
            abort(404, 'La solicitud seleccionada no existe.');
        }

        // Obtener el nombre de la institución de la solicitud seleccionada
        $institutionName = $selectedRequest->institution_name;

        // Obtener los datos del usuario autenticado
        $user = User::find($userId);

        // Obtener los detalles del usuario autenticado
        $userDetails = user_details::where('fk_user', $userId)->first();

        // Obtener los datos de la dirección del usuario autenticado
        $addressData = Address_Data::where('fk_useraddress', $userId)->first();

        // Obtener los datos médicos del usuario autenticado
        $medicalData = Medical_Data::where('fk_userm', $userId)->first();

        // Definir la vista que se utilizará según el nombre de la institución
        $view = ($institutionName === 'Sistema DIF Municipal de Santa Cruz Xoxocotlán')
            ? 'pdf.pdfrequestdif'
            : 'pdf.pdfrequest';

        // Generar la vista con los datos obtenidos
        $pdf = PDF::loadView($view, compact('user', 'userDetails', 'addressData', 'medicalData', 'selectedRequest'));

        // Opcional: puedes personalizar el nombre del archivo PDF generado
        $fileName = 'informe_usuarios.pdf';

        // Descargar el archivo PDF
        return $pdf->stream($fileName);
    }
    public function sendpdf(Request $request, $idrequest)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener el ID de la solicitud seleccionada desde el parámetro de la URL
        // Ya no es necesario obtenerlo con $request->input('idrequest') porque ahora lo pasamos como argumento en la ruta

        // Obtener la solicitud seleccionada por el ID
        $selectedRequest = Solicitud::getRequestByIdAndUser($idrequest, $userId);

        // Verificar si la solicitud existe antes de continuar
        if (!$selectedRequest) {
            abort(404, 'La solicitud seleccionada no existe.');
        }

        // Obtener los datos del usuario autenticado
        $user = User::find($userId);

        // Obtener los detalles del usuario autenticado
        $userDetails = user_details::where('fk_user', $userId)->first();

        // Obtener los datos de la dirección del usuario autenticado
        $addressData = Address_Data::where('fk_useraddress', $userId)->first();

        // Obtener los datos médicos del usuario autenticado
        $medicalData = Medical_Data::where('fk_userm', $userId)->first();

        // Obtener el nombre de la institución de la solicitud seleccionada
        $institutionName = $selectedRequest->institution_name;

        // Definir la vista que se utilizará según el nombre de la institución
        $view = ($institutionName === 'Sistema DIF Municipal de Santa Cruz Xoxocotlán')
            ? 'pdf.pdfrequestdif'
            : 'pdf.pdfrequest';

        // Generar la vista con los datos obtenidos
        $pdf = PDF::loadView($view, compact('user', 'userDetails', 'addressData', 'medicalData', 'selectedRequest'));

        // Opcional: puedes personalizar el nombre del archivo PDF generado
        $fileName = 'solicitud_usuarios.pdf';

        // Definir las direcciones de correo según el nombre de la institución
        $recipientEmail = null;
        if ($institutionName === 'Instituto del Deporte (INDEPORTE), Oaxaca') {
            $recipientEmail = 'l18920041@voaxaca.tecnm.mx';
        } elseif ($institutionName === 'Sistema DIF Municipal de Santa Cruz Xoxocotlán') {
            $recipientEmail = 'bladimir.ortiz25@gmail.com';
        }

        // Verificar si se encontró una dirección de correo válida
        if ($recipientEmail) {
            // Enviar el correo con el archivo PDF adjunto
            try {
                Mail::to($recipientEmail)->send(new FileAttachmentMail($pdf->output(), $fileName));
                return "Correo enviado con éxito.";
            } catch (\Exception $e) {
                return "Error al enviar el correo: " . $e->getMessage();
            }
        } else {
            return "Error: No se pudo determinar la dirección de correo adecuada para esta institución.";
        }
    }

    }

