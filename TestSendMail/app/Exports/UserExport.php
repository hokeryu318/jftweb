<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $groups = DB::table('groups')->get();
        return $groups;
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'CREATE_AT',
            'UPDATED_AT'
        ];
    }

}
