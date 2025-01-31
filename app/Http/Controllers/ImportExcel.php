<?php

namespace App\Http\Controllers;

use App\Models\excelimportacion;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Facades\Excel;


class ImportExcel extends Controller
{
    public function index()
    {
        $customerData = DB::table('excelimportacions')->orderBy('id', 'ASC')->get();
        return view('import_excel', compact('customerData'));
    }

    public function formulario()
    {
        return view('formulario');
    }

    public function import(Request $request)
    {
        // Validación del archivo
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ], [
            'select_file.required' => 'Por favor, selecciona un archivo.',
            'select_file.mimes' => 'El archivo debe ser un archivo Excel (.xls o .xlsx).',
        ]);

        // Si el archivo está presente
        if ($request->hasFile('select_file')) {

            // Importar los datos del archivo
            $collection = new UsersImport();
            $collection->import($request->file('select_file'));

            // Obtener errores de validación (si los hay)
            $validation = $collection->getErrors();
            if (!empty($validation)) {
                return redirect('/import_excel/formulario')
                    ->with('validation_errors', $validation);
            }

            // Si no hay errores, procesamos el archivo
            $datos = Excel::toCollection(new UsersImport, $request->file('select_file'))->first();

            // Corregir los datos (mapear y transformar según sea necesario)
            $datosCorregidos = $datos->map(function ($item) {

                // Corregir el estado 'activo' a formato binario (1 o 0)
                $item['activo'] = ($item['activo'] == 'si') ? 1 : 0;

                // Formatear la fecha si es un valor numérico (fecha Excel)
                if (is_numeric($item['fechanacimiento'])) {
                    $unix_date = (($item['fechanacimiento']) - 25569) * 86400;
                    $fechaFormateada = date('Y-m-d', $unix_date);
                    $item['fechanacimiento'] = $fechaFormateada;
                }

                return $item;
            });

            // Guardar los datos corregidos en la base de datos
            $datosCorregidos->each(function ($item) {
                excelimportacion::create($item->toArray());
            });

            // Redirigir con mensaje de éxito
            return redirect('/import_excel/index')
                ->with('success', 'Importado Correctamente');
        }
    }
}
