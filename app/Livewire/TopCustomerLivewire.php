<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductSales;

class TopCustomerLivewire extends Component
{
    public function render()
    {
        return view('livewire.top-customer-livewire',[
            'TopSales'=> ProductSales::selectRaw('SUM(Price) as TotalSale, product_sales.Device_id, users.name as OwnerName')
            ->join('devices', 'product_sales.Device_id', '=', 'devices.Device_id')
            ->join('users', 'devices.Owner', '=', 'users.name')
            ->groupBy('product_sales.Device_id', 'users.name')
            ->orderBy('TotalSale', 'desc')
            ->get()
        ]);
    }
}
