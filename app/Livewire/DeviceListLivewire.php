<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Device;

class DeviceListLivewire extends Component
{
    public function render()
    {
        return view('livewire.device-list-livewire', [
            'data' => Device::all()
        ]);
    }
}
