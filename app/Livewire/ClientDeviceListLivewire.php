<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductSales;
use App\Models\Device;
use Session;

class ClientDeviceListLivewire extends Component
{
    public function render()
    {
        return view('livewire.client-device-list-livewire',[
            'data' => Device::where('Owner', session()->get('Name'))->get()
        ]);
    }
}
