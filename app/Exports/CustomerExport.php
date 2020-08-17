<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class CustomerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::select('id','name','email','mobile','address1','created_at')->get();
    }
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Mobile',
            'Address',
            'Registration date',
        ];
    }
}
