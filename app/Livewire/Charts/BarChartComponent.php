<?php

namespace App\Livewire\Charts;

use App\Models\User;
use Livewire\Component;

class BarChartComponent extends Component
{
    public $labels = [];
    public $counts = [];

    public function render()
    {
        return view('livewire.charts.bar-chart-component');
    }



    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        // Obtén los datos de la base de datos
        $userData = User::select('role_name', \DB::raw('count(*) as count'))
            ->groupBy('role_name')
            ->get();

        $this->labels = $userData->pluck('role_name')->toJson();
        $this->counts = $userData->pluck('count')->toJson();
    }
}







