<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use App\Models\excelimportacion;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithHeadingRow, WithValidation
{
    use Importable;

    private $errors = [];

    public function collection(Collection $rows)
    {
        $rows = $rows->toArray();

        foreach ($rows as $row) {
            $validator = Validator::make($row, $this->rules(), $this->customvalidationMessages());
            if ($validator->fails()) {
                foreach ($validator->errors() as $error) {
                        // acumular errores de validación:
                        $this->errors[] = $error;
                }
            }
        }
    }

    public function rules(): array
    {
        return [
            '*.nombre' => 'required|unique:excelimportacions,nombre|string|max:255|min:3',
            '*.direccion' => 'required|string|max:255|min:10',
            '*.saldo' => 'required|integer',
            '*.fechanacimiento' => 'required|max:45685',
            '*.documento' => 'required|numeric|min:5',
            '*.activo' => ['required',Rule::in(['si','no'])],
            '*.notas' => 'required|numeric',
            '*.descripcion' => 'required|string|max:65000',
        ];
    }


    public function customvalidationMessages()
    {
        return [
            '*.nombre' => 'Todos los campos Nombre son obligatorios.',
            '*.nombre.unique' => 'El campo Nombre esta repetido, por favor revisa los datos.',
            '*.direccion' => 'Todos los campos Dirección son obligatorios.',
            '*.saldo.required' => 'Todos los campos Saldo son obligatorios.',
            '*.saldo.integer' => 'Todos los campos Saldo deben ser numericos.',
            '*.fechanacimiento.required' => 'Todos los campos Fechanacimiento son obligatorios.',
            '*.documento' => 'Todos los campos Documento son obligatorios.',
            '*.activo.required' => 'Todos los campos Activo son obligatorios.',
            '*.activo.in' => 'Todos los campos Activo deben ser si o no.',
            // Añade otros mensajes personalizados aquí
        ];
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
