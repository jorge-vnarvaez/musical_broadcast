<div>
    <div class="flex flex-col lg:mr-10">
        <span class="font-bold">Protocolo COVID</span>
        <div class="flex mt-1">
            <input type="text" wire:model='nuevoProtocolo' wire:keydown.enter.prevent="nuevoItem"
                placeholder="Nuevo protocolo" class="bg-primary border-1 border-white rounded-lg p-0 w-36 mr-2"/>
            <a wire:click='nuevoItem'>Agregar</a>
        </div>
        <ul class="mt-2 mb-2">
            @foreach ($protocolos as $index => $protocolo)
                <livewire:organizador.talleres.crear.protocolo.protocolo :protocolo="$protocolo" :wire:key="$index" />
            @endforeach
        </ul>
    </div>
</div>
