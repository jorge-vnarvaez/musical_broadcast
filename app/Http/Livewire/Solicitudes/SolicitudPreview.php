<?php

namespace App\Http\Livewire\Solicitudes;

use Livewire\Component;
use App\Models\SolicitudTaller;
use App\Models\Taller;

class SolicitudPreview extends Component
{

    public $solicitudActual;

    protected $listeners = ['visualizarSolicitud'];

    public function visualizarSolicitud(array $solicitudSeleccionada) {
        $this->solicitudActual = SolicitudTaller::findOrFail($solicitudSeleccionada['id']);
    }

    public function aprobarTaller() {
        $taller = Taller::find($this->solicitudActual->taller->id);
        $taller->estado = 1;
        $taller->save();

        $solicitud = SolicitudTaller::find($this->solicitudActual->id);
        $solicitud->estado = 3;
        $solicitud->save();
    }

    public function render()
    {
        return view('livewire.solicitudes.solicitud-preview');
    }
}