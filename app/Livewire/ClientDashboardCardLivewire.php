<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ProductSales;
use App\Models\Device;
use Session;

class ClientDashboardCardLivewire extends Component
{


    public function render()
    {
        return view('livewire.client-dashboard-card-livewire',[
            'TotalSales' => ProductSales::selectRaw('SUM(product_sales.Price) as TotalPrice')
            ->join('devices','product_sales.Device_id', '=', 'devices.Device_Id')
            ->where('devices.Owner',session()->get('Name'))
            ->value('TotalPrice') ?? 0,
            'TotalDevice' => Device::where('Owner',session()->get('Name'))
            ->count()
        ]);
    }
}
