<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $barChartData = [
            'labels' => ['Label 1', 'Label 2', 'Label 3'],
            'data' => [10, 20, 30],
        ];

        return view('charts', compact('barChartData'));
    }

    public function generateLineGraph()
    {
        // Fetch data from the database
        $bookingData = Booking::all(); 
    
        // Process the data
        $labels = $bookingData->pluck('created_at')->map(function ($date) {
            return $date->format('Y-m-d');
        })->toArray();
    
        $lineGraphData = $bookingData->pluck('NumTravelers')->toArray(); 
        $histogramData = $bookingData->pluck('Nights')->toArray(); 
    
        return view('linegraph', [
            'lineGraphData' => [
                'labels' => $labels,
                'data' => $lineGraphData,
            ],
            'histogramData' => [
                'labels' => $labels,
                'data' => $histogramData,
            ],
            'axisTitles' => [
                'x' => 'Booking Date',
                'y' => 'Number of Travelers',
            ],
        ]);
    }
    
    
    
}
