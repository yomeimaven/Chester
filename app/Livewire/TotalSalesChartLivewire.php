<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductSales;
use App\Services\ChartService;

class TotalSalesChartLivewire extends Component
{
    public $monthlySalesData;
    public $chartData;
    protected $chartService;
    protected $poll = '5s'; // Poll every 5 seconds

    public function mount(ChartService $chartService)
    {
        $this->chartService = $chartService;
        $this->loadSalesData();
    }

    public function loadSalesData()
    {
        $sales = ProductSales::selectRaw('MONTH(created_at) as month, SUM(price) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize array with default values
        $this->monthlySalesData = array_fill(1, 12, 0); // Months 1-12 with 0

        // Populate the array with actual sales data
        foreach ($sales as $sale) {
            $this->monthlySalesData[$sale->month] = $sale->total; // Fill the corresponding month
        }

        // Zero base index
        $this->monthlySalesData = array_values($this->monthlySalesData);
    }

    public function render()
    {
        $chartData = $this->chartService->SingleDataset($this->monthlySalesData);
        return view('livewire.total-sales-chart-livewire', [
            'chartdata' => $chartData
        ]);
    }
}
