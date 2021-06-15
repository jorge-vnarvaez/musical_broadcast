<?php

namespace App\Http\Livewire\Administrador\Eventos;

use Livewire\Component;
use App\Models\SolicitudEvento;
use App\Models\Evento;

class EventoPreview extends Component
{

    public $solicitudActual, $observacion;

    protected $rules = [
        "observacion" => 'required|string|min:10|max:255',
    ];

    protected $listeners = [
        "mostrarEvento",
        "aprobarEvento",
    ];

    public function mostrarEvento(array $evento) {
        $this->solicitudActual = SolicitudEvento::findOrFail($evento["id"]);
        $this->dispatchBrowserEvent("mostrarSolicitudEvento", array("slideActual" => $evento["actual"]));
    }

    
    public function aprobarEvento() {
        $evento = Evento::find($this->solicitudActual->evento->id);
        $evento->estado = 1;
        $evento->save();

        $solicitud = SolicitudEvento::find($this->solicitudActual->id);
        $solicitud->estado = 3;
        $solicitud->save();
    }

    public function enviarObservacion() {

        $this->validate();

        $solicitud = SolicitudEvento::find($this->solicitudActual->id);
        $solicitud->estado = 1;
        $solicitud->observacion = $this->observacion;
        $solicitud->save();

        $this->dispatchBrowserEvent("observacionAniadida");
    }

    public function render()
    {
        return view('livewire.administrador.eventos.evento-preview');
    }
}