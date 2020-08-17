<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class OrderExport implements FromView
// FromCollection, WithHeadings, ShouldAutoSize,
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::select('id','name','email','mobile','address1','created_at')->get();
    }
    public function headings(): array
    {
        // return [
        //     '#',
        //     'Name',
        //     'Email',
        //     'Mobile',
        //     'Address',
        //     'Registration date',
        // ];
    }
    public function view(): View
    {
        // dd(Order::where('status',1)->with(['customer','ordproducts'])->get());
        return view('exports.orders', [
            'orders' => Order::where('status',1)->with(['customer','ordproducts'])->get(),
        ]);
    }
}
