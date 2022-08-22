<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id', 'name', 'mobile', 'created_at')->where('isAdmin','!=',1)->get();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Mobile',
            'Created at',
        ];
    }
}
