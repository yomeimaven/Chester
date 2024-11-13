<?php

namespace App\Services;

use App\Charts\TotalSalesChart;

class ChartService {
    function DoubleDataset($dataset1, $dataset2) {
        $chart = new TotalSalesChart;
    
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        
        // First dataset
        $chart->dataset('Rice 1', 'bar', $dataset1)
            ->backgroundColor('#9e6de0');
        
        // Second dataset
        $chart->dataset('Rice 2', 'bar', $dataset2)
            ->backgroundColor('#faafca');
        
        $chart->options([
            'scales' => [
                'xAxes' => [[
                    'ticks' => [
                        'autoSkip' => false,
                    ],
                    'gridLines' => [
                        'display' => false,
                    ],
                ]],
                'yAxes' => [[
                    'ticks' => [
                        'stepSize' => 500,
                        'max' => 5000,
                    ],
                    'gridLines' => [
                        'color' => '#e0e0e0',
                        'lineWidth' => 1,
                    ],
                ]],
            ],
            'legend' => [
                'display' => true,
                'position' => 'top',
                'labels' => [
                    'fontColor' => '#333',
                    'fontSize' => 10,
                ],
            ],
            'tooltips' => [
                'enabled' => true,
                'backgroundColor' => 'rgba(0, 0, 0, 0.7)',
                'titleFontColor' => '#fff',
                'bodyFontColor' => '#fff',
                'borderColor' => '#fff',
                'borderWidth' => 1,
            ],
        ]);
    
        return $chart;
    }

    function SingleDataset($dataset1) {
        $chart = new TotalSalesChart;
    
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        
        // First dataset
        $chart->dataset('Overall Sales', 'bar', $dataset1)
            ->backgroundColor('#9e6de0');
        
        $chart->options([
            'scales' => [
                'xAxes' => [[
                    'ticks' => [
                        'autoSkip' => false,
                    ],
                    'gridLines' => [
                        'display' => false,
                    ],
                ]],
                'yAxes' => [[
                    'ticks' => [
                        'stepSize' => 500,
                        'max' => 5000,
                    ],
                    'gridLines' => [
                        'color' => '#e0e0e0',
                        'lineWidth' => 1,
                    ],
                ]],
            ],
            'legend' => [
                'display' => true,
                'position' => 'top',
                'labels' => [
                    'fontColor' => '#333',
                    'fontSize' => 10,
                ],
            ],
            'tooltips' => [
                'enabled' => true,
                'backgroundColor' => 'rgba(0, 0, 0, 0.7)',
                'titleFontColor' => '#fff',
                'bodyFontColor' => '#fff',
                'borderColor' => '#fff',
                'borderWidth' => 1,
            ],
        ]);
    
        return $chart;
    }
}
