<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductSales;
use App\Models\Devices;
use Session;

class TopVendiLivewire extends Component
{
    public function render()
    {
        return view('livewire.top-vendi-livewire',[
            'TopVendo'=> ProductSales::selectRaw('SUM(Price) as TotalSale, product_sales.Device_id, devices.Device_Name as DeviceName')
            ->join('devices', 'product_sales.Device_id', '=', 'devices.Device_Id')
            ->where('devices.Owner',session()->get('Name'))
            ->groupBy('product_sales.Device_id', 'devices.Device_Name')
            ->orderBy('TotalSale', 'desc')
            ->get()
        ]);
    }
}
