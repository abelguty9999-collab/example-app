<?php

namespace App\Exports;

use App\Models\Trainer;
use Illuminate\Support\Enumerable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainersExport implements FromCollection, WithHeadings
{
    public function collection(): Enumerable
    {
        return Trainer::select(
            'id',
            'name',
            'apellido',
            'avatar'
        )->orderBy('id')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellido',
            'Avatar'
        ];
    }
}

