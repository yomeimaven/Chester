<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Device;
use App\Models\ProductSales;

class IndividualsReportLivewire extends Component
{
    public $Device_Id;


    public function render()
    {
        return view('livewire.individuals-report-livewire',[
            'data'=>ProductSales::where('Device_id', $this->Device_Id)
            ->orderBy('created_at','desc')
            ->get()
        ]);
    }
}
