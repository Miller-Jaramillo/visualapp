<?php

namespace App\Livewire\Charts;

use App\Models\Archivo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BarChartComponent extends Component
{
    public $labels = [];
    public $counts = [];

    public $conteoMujeres;
    public $conteoHombres;

    public function render()
    {
        return view('livewire.charts.bar-chart-component');
    }



    public function mount()
    {
        $this->refreshData();
    }


    public function refreshData2()
    {
        // Obtén los datos de la base de datos
        $userData = User::select('role_name', DB::raw('count(*) as count'))
            ->groupBy('role_name')
            ->get();

        $this->labels = $userData->pluck('role_name')->toJson();
        $this->counts = $userData->pluck('count')->toJson();
    }


    public function refreshData()
    {

            $this->conteoMujeres = DB::table('archivos')
            ->where('genero', 'F')
            ->count();

            $this->conteoHombres = DB::table('archivos')
            ->where('genero', 'M')
            ->count();


        // Otras operaciones para obtener los datos que deseas mostrar

        // Asigna los resultados a las propiedades de tu componente


        // Realiza otras operaciones para obtener los datos que deseas mostrar en el gráfico

        // Actualiza los datos del gráfico
        $this->labels = json_encode(['Mujeres', 'Hombres']); // Ejemplo de etiquetas
        $this->counts = json_encode([$this->conteoMujeres, $this->conteoHombres]); // Ejemplo de datos de recuento

        // Otros pasos necesarios para actualizar los datos del gráfico
    }

}







