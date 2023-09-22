<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Storage;
class UpdateUserRequestController extends Controller
{
    public function showUpdate($requestfolio)
    {
        // Llamada al método del modelo para obtener la solicitud
        $solicitud = Solicitud::getRequestByRequestfolio($requestfolio);

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

            return view('admin.home.updateuserrequest', compact('solicitud'));
        } else {
            // Si no se encontró la solicitud, redirige a una página de error o a alguna otra ruta
            return redirect()->route('error.page')->with('error', 'La solicitud no existe.');
        }
    }

    public function updaterequest($requestfolio)
    {
        // Llamada al método del modelo para obtener la solicitud
        $solicitud = Solicitud::where('requestfolio', $requestfolio)->with('user')->first();

        // Verificación si se encontró la solicitud
        if ($solicitud) {
            // Si se envió el formulario con un nuevo archivo adjunto
            if (request()->hasFile('new_applicant_files')) {
                $newApplicantFile = request()->file('new_applicant_files');

                // Guardar el nuevo archivo adjunto en el servidor
                $filePath = $newApplicantFile->store('archivos');
                $solicitud->update(['applicant_files' => $filePath]);
            }

            // Actualizar otros campos en la tabla "request"
            $solicitud->update([
                'sector_destined' => request('sector_destined'),
                'institution_name' => request('institution_name'),
                'request_description' => request('request_description'),
                'created_date' => request('created_date'),
                'creation_time' => request('creation_time'),
            ]);

            return redirect()->route('admin.userrequest')->with('success', 'Solicitud actualizada correctamente.');
        } else {
            // Si no se encontró la solicitud, redirige a una página de error o a alguna otra ruta
            return redirect()->route('error.page')->with('error', 'La solicitud no existe.');
        }
    }


    public function deleteRequest($requestfolio)
    {
        // Buscar la solicitud en la base de datos
        $solicitud = Solicitud::getRequestByRequestfolio($requestfolio);

        // Verificar si se encontró la solicitud
        if ($solicitud) {
            // Eliminar el archivo adjunto si existe
            if ($solicitud->applicant_files) {
                Storage::delete($solicitud->applicant_files);
            }

            // Eliminar la solicitud de la tabla "request"
            $solicitud->delete();

            return redirect()->route('admin.userrequest')->with('success', 'Solicitud eliminada correctamente.');
        } else {
            // Si no se encontró la solicitud, redirigir a una página de error o a alguna otra ruta
            return redirect()->route('error.page')->with('error', 'La solicitud no existe.');
        }
    }

}
