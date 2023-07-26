<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Storage;
class ReadRequestController extends Controller
{
    public function index()
    {
           // Obtener las solicitudes del usuario autenticado
    $user = Auth::user();
    $solicitudes = Solicitud::where('fk_userr', $user->id)->get();

    // Renderizar la vista con los datos de las solicitudes
    return view('request.readrequest', compact('solicitudes'));
    }

    public function showUpdate($idrequest, $fk_userr)
    {

        // Llamada al método del modelo para obtener la solicitud
        $solicitud = Solicitud::getRequestByIdAndUser($idrequest, $fk_userr);

        // Verificación si se encontró la solicitud
        if ($solicitud) {
            // Aquí tienes los datos de la solicitud específica

            // Si se envió el formulario con un nuevo archivo adjunto
            if (request()->hasFile('new_applicant_files')) {
                $newApplicantFile = request()->file('new_applicant_files');

                // Guardar el nuevo archivo adjunto en el servidor
                $filePath = $newApplicantFile->store('archivos');
                $solicitud->update(['applicant_files' => $filePath]);
            }

            return view('request.updaterequest', compact('solicitud'));
        } else {
            // Si no se encontró la solicitud, redirige a una página de error o a alguna otra ruta
            return redirect()->route('error.page')->with('error', 'La solicitud no existe o no pertenece al usuario.');
        }
    }
    public function updaterequest($idrequest, $fk_userr)
    {
        // Llamada al método del modelo para obtener la solicitud
        $solicitud = Solicitud::getRequestByIdAndUser($idrequest, $fk_userr);

        // Verificación si se encontró la solicitud
        if ($solicitud) {
            // Aquí tienes los datos de la solicitud específica

            // Si se envió el formulario con un nuevo archivo adjunto
            if (request()->hasFile('new_applicant_files')) {
                $newApplicantFile = request()->file('new_applicant_files');

                // Guardar el nuevo archivo adjunto en el servidor
                $filePath = $newApplicantFile->store('archivos');
                $solicitud->update(['applicant_files' => $filePath]);
            }

            // Actualizar otros campos en la tabla "request"
            $solicitud->update([
                'requestfolio' => request('requestfolio'),
                'sector_destined' => request('sector_destined'),
                'institution_name' => request('institution_name'),
                'request_description' => request('request_description'),
                'created_date' => request('created_date'),
                'creation_time' => request('creation_time'),
            ]);

            return redirect()->route('readrequest', [$idrequest, $fk_userr])->with('success', 'Solicitud actualizada correctamente.');
        } else {
            // Si no se encontró la solicitud, redirige a una página de error o a alguna otra ruta
            return redirect()->route('error.page')->with('error', 'La solicitud no existe o no pertenece al usuario.');
        }
    }
    public function deleteRequest($idrequest, $fk_userr)
    {
        // Buscar la solicitud en la base de datos
        $solicitud = Solicitud::getRequestByIdAndUser($idrequest, $fk_userr);

        // Verificar si se encontró la solicitud
        if ($solicitud) {
            // Eliminar el archivo adjunto si existe
            if ($solicitud->applicant_files) {
                Storage::delete($solicitud->applicant_files);
            }

            // Eliminar la solicitud de la tabla "request"
            $solicitud->delete();

            return redirect()->route('readrequest')->with('success', 'Solicitud eliminada correctamente.');
        } else {
            // Si no se encontró la solicitud, redirigir a una página de error o a alguna otra ruta
            return redirect()->route('error.page')->with('error', 'La solicitud no existe o no pertenece al usuario.');
        }
    }

}


