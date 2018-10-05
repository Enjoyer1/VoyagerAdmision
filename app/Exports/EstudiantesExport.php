<?php

namespace App\Exports;

use App\Estudiante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EstudiantesExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function query()
    {
        return Estudiante::select('nombre', 'apellido1', 'apellido2', 'genero', 'celular', 'email', 'run', 'curso_id', 'colegio_id', 'created_at');
    }


    public function headings(): array
    {
        return [
            'Nombre',
            'Primer Apellido',
            'Segundo Apellido',
            'Sexo',
            'Celular',
            'Email',
            'RUN',
            'Curso',
            'Colegio',
            'Fecha Creación',

        ];
    }
    /**
     * @return array
     */



}
