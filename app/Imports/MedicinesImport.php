<?php

namespace App\Imports;

use App\Models\Medicamento;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicinesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Medicamento([
            'nombreMedicamento' => $row[0],
            'precioNormal' =>$row[1],
            'descuento' => $row[2],
            'precioDescuento' => $row[3],
            'status' => $row[4],
            'licencia' =>$row[5],
            'avisoLegal' =>$row[6],
            'fichaTecnica' =>$row[7],
            'laboratorio_id' => $row[8],
            'categoria_id' =>$row[9],
        ]);
    }
}
