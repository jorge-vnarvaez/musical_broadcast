<div>
    <div class="text-white">

        <div class="mb-4 text-3xl font-bold">
            {{ $tallerActual->TAL_Nombre }}
        </div>
        
        <div class="mb-10">{{ $tallerActual->TAL_Descripcion }} </div>

        <div class="grid lg:grid-cols-2 md:grid-cols-2 gap-8 mb-5 lg:w-full w-80">

            <div class="flex lg:flex-row flex-col justify-between lg:w-96">
                <div class="lg:mb-0 mb-3 mr-4">
                    <p class="font-bold">ORGANIZADOR</p>
                    <p>{{ $tallerActual->organizador->nombre }} {{ $tallerActual->organizador->apellidos }}</p>
                </div>

                <div class="lg:mb-0 mb-3 mr-4">
                    <p class="font-bold">Teléfono</p>
                    <p>{{ $tallerActual->organizador->telefono }}</p>
               </div>

               <div>
                    <p class="font-bold">Email</p>
                    <p>{{ $tallerActual->organizador->email }}</p>
                </div>
            </div>

            <div>
                <p class="font-bold">HORARIO</p>
                <p>{{ $tallerActual->TAL_Fecha }} {{ $tallerActual->TAL_Hora }}</p>
            </div>

            <div class="flex lg:flex-row flex-col justify-between w-80">
                <div>
                    <span class="font-bold">REQUISITOS</span>
                    @foreach($tallerActual->TAL_Requisitos as $requisito)
                        <p>{{ $requisito }}</p>
                    @endforeach
                </div>

                <div class="lg:mt-0 mt-4">
                    <span class="font-bold">PROTOCOLO COVID</span>
                    @foreach($tallerActual->TAL_Protocolo as $protocolo)
                    <p>{{ $protocolo }}</p>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="font-bold">LUGAR</p>
                <p>{{ $tallerActual->TAL_Lugar }}</p>
            </div>
        </div>

        <livewire:taller.inscripcion-taller :tallerSeleccionado='$tallerActual' :wire:key='$tallerActual->id' />
        
    </div>
</div>



