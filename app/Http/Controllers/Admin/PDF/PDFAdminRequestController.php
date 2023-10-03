<?php

namespace App\Http\Controllers\Admin\PDF;

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
class PDFAdminRequestController extends Controller
{
    public function generatePDFAdmin(Request $request, $idrequest)
{
    // Obtener la solicitud seleccionada por el ID
    $selectedRequest = Solicitud::find($idrequest);

    // Verificar si la solicitud existe antes de continuar
    if (!$selectedRequest) {
        abort(404, 'La solicitud seleccionada no existe.');
    }

    // Obtener el ID del usuario al que está relacionada la solicitud
    $userId = $selectedRequest->fk_userr;

    // Obtener el nombre de la institución de la solicitud seleccionada
    $institutionName = $selectedRequest->institution_name;

    // Obtener los datos del usuario a partir del ID
    $user = User::find($userId);

    // Obtener los detalles del usuario
    // Obtener los detalles del usuario
$userDetails = user_details::where('fk_user', $userId)->first();

// Verificar si se encontraron detalles del usuario
if ($userDetails !== null) {
    // Acceder a las propiedades
    $personalname = $userDetails->personalname;
} else {
    // Manejar el caso en el que no se encontraron detalles del usuario
    $personalname = 'Nombre no disponible';
}



    // Obtener los datos de la dirección del usuario
    $addressData = Address_Data::where('fk_useraddress', $userId)->first();

    // Obtener los datos médicos del usuario
    $medicalData = Medical_Data::where('fk_userm', $userId)->first();

    // Definir la vista que se utilizará según el nombre de la institución
    $view = ($institutionName === 'Sistema DIF Municipal de Santa Cruz Xoxocotlán')
        ? 'pdf.pdfrequestdif'
        : 'pdf.pdfrequestadmin';

    // Generar la vista con los datos obtenidos
    $pdf = PDF::loadView($view, compact('user', 'userDetails', 'addressData', 'medicalData', 'selectedRequest'));

    // Opcional: puedes personalizar el nombre del archivo PDF generado
    $fileName = 'informe_usuarios.pdf';

    // Descargar el archivo PDF
    return $pdf->stream($fileName);
}




public function sendpdfadmin(Request $request, $idrequest)
{
    // Obtener la solicitud seleccionada por el ID
    $selectedRequest = Solicitud::find($idrequest);

    // Verificar si la solicitud existe antes de continuar
    if (!$selectedRequest) {
        abort(404, 'La solicitud seleccionada no existe.');
    }

    // Obtener el nombre de la institución de la solicitud seleccionada
    $institutionName = $selectedRequest->institution_name;

    // Obtener la institución correspondiente a la solicitud
    $institution = $selectedRequest->institution;

    // Verificar si se encontró una institución válida y tiene una dirección de correo electrónico
    if ($institution && $institution->institution_email) {
        // Obtener los datos del usuario de la solicitud
        $user = User::find($selectedRequest->fk_userr);

        // Obtener los detalles del usuario
        $userDetails = user_details::where('fk_user', $user->id)->first();

        // Obtener los datos de la dirección del usuario
        $addressData = Address_Data::where('fk_useraddress', $user->id)->first();

        // Obtener los datos médicos del usuario
        $medicalData = Medical_Data::where('fk_userm', $user->id)->first();

        // Definir la vista que se utilizará según el nombre de la institución
        $view = ($institutionName === 'Sistema DIF Municipal de Santa Cruz Xoxocotlán')
            ? 'pdf.pdfrequestdif'
            : 'pdf.pdfrequestadmin';

        // Generar la vista con los datos obtenidos
        $pdf = PDF::loadView($view, compact('user', 'userDetails', 'addressData', 'medicalData', 'selectedRequest'));

        // Opcional: puedes personalizar el nombre del archivo PDF generado
        $fileName = 'solicitud_usuarios.pdf';

        // Enviar el correo con el archivo PDF adjunto a la dirección de correo de la institución
        try {
            Mail::to($institution->institution_email)->send(new FileAttachmentMail($pdf->output(), $fileName));
            return "Correo enviado con éxito.";
        } catch (\Exception $e) {
            return "Error al enviar el correo: " . $e->getMessage();
        }
    } else {
        return "Error: No se pudo determinar la dirección de correo adecuada para esta institución.";
    }
}


}
