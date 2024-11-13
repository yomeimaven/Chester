<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ProductSales;
use App\Models\Device;

class DashboardCardLivewire extends Component
{

    public function render()
    {
        return view('livewire.dashboard-card-livewire',[
            'TotalUser' => User::count(),
            'TotalSales' => ProductSales::selectRaw('SUM(Price) as TotalPrice')->value('TotalPrice') ?? 0,
            'TotalDevice' => Device::count()
        ]);
    }
}
