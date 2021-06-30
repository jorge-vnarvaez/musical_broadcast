<?php

namespace App\Http\Livewire\Representante\Artista\Solicitudes;

use Livewire\Component;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Builder;

class MisSolicitudes extends Component
{

    public $artistasPendientes, $artistasRevisados, $artistasModificados;

    public function mount()
    {
        $this->artistasPendientes = Artista::whereHas('solicitud', function (Builder $query) {
            $query->where("estado", 0);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();

        $this->artistasRevisados = Artista::whereHas('solicitud', function (Builder $query) {
            $query->where("estado", 1);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();

        $this->artistasModificados = Artista::whereHas('solicitud', function (Builder $query) {
            $query->where("estado", 4);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();
    }

    public function render()
    {
        return view('livewire.representante.artista.solicitudes.mis-solicitudes');
    }
}