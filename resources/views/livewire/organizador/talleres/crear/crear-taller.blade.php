<div class="min-h-screen py-5">
    <div class='container mx-auto py-5 text-white bg-black bg-opacity-20 px-5'>
        <div class="mb-6 lg:mt-0 mt-5"><span class="text-4xl">Organizar nuevo taller.</span></div>
        @if ($errors)
            @foreach ($errors->all() as $message)
                {{ $message }}
            @endforeach
        @endif
        <div class="lg:flex">
            <div class="flex flex-col lg:mr-5">
                <form wire:submit.prevent='validarNuevoTaller' enctype="multipart/form-data">
                    @csrf
                    <div class="lg:flex">
                        <div class="flex flex-col">
                            <span class="font-bold">Titulo</span>
                            <div class="flex flex-col mt-1">
                                <input type="text"
                                    class="border-1 border-white bg-primary px-0 py-1 px-5 rounded-lg font-light lg:w-96"
                                    wire:model='titulo' maxlength="30"
                                    placeholder="Escriba el titulo del taller (máximo 30 caracteres)" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-col">
                        <div class="flex flex-col lg:flex-row mb-3">
                            <div class="flex flex-col mt-3" x-data>
                                <span class="font-bold">Fecha</span>
                                <input type="date" wire:model="fecha" x-bind:min="$wire.hoy"
                                    class="bg-primary text-white p-0 mr-8 px-5 mt-1 rounded-lg border-1 border-white" />
                            </div>
                            <div class="flex flex-col mt-3">
                                <span class="font-bold">Hora</span>
                                <div class="rounded-full">
                                    <input type="time" id="hora" wire:model="hora"
                                        class="bg-primary rounded-lg px-5 border-1 border-white p-0 mt-1">

                                </div>

                            </div>

                        </div>
                        <div class="flex items-center mb-2 mt-3">
                            <div class="flex flex-col">
                                <div class="flex">
                                    <span class="font-bold">Aforo:</span>
                                    <div class="flex flex-col">
                                        <input type="number" min='1' max='10' id="aforo" wire:model='aforo'
                                            class="bg-primary border-1 border-white rounded-lg px-3 p-0 px-2 w-20 ml-3 mr-3" />

                                    </div>
                                </div>
                                <span>Máximo 10 personas.</span>
                            </div>
                        </div>
                        <div class="flex lg:flex-row flex-col lg:items-center mb-3 mt-3 text-sm">
                            <span class="font-bold">Lugar: </span>
                            <div class="flex flex-col">
                                <input type="text" placeholder="¿Donde planeas realizar el taller?" wire:model='lugar'
                                    class="border-1 border-white bg-primary w-64 py-0 rounded-lg px-2" />

                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="descripcion" class="font-bold lg:w-96">Descripción</label>
                            <div class="flex flex-col">
                                <textarea placeholder="Escriba una descripción (máximo 255 caracteres)"
                                    wire:model='descripcion' maxlength="255"
                                    class="resize-none lg:w-96 border-1 border-white rounded-lg bg-primary h-40 mt-1 mb-1"></textarea>
                                <span>{{ $caracteres_descripcion }} / 255</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="w-80">
                <div class="flex flex-col lg:justify-between mb-3">
                    <span>Imagen</span>
                    <div wire:loading wire:target="imagen" class="bg-blue-100 w-64 text-blue-700 px-4" role="alert">
                        <p class="font-bold  py-1">Cargando imagen</p>
                    </div>
                </div>

                @error('imagen')
                    <div>
                        <label for="imagen-taller">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-40 lg:w-96 border-2 border-white rounded-lg border-light-blue-500 border-opacity-100"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </label>
                        <input type="file" wire:model="imagen" id="imagen-taller" class="hidden" wire:ignore />
                    </div>
                @else
                    @if (!$imagen)
                        <div>
                            <label for="imagen-taller">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-40 lg:w-80 w-48 border-2 border-white rounded-lg border-light-blue-500 border-opacity-100"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </label>
                            <input type="file" wire:model="imagen" id="imagen-taller" class="hidden" wire:ignore />
                        </div>
                    @else
                        <div class="mt-3">
                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $url }}" class="h-40 lg:w-80 w-48 border-2">

                            <div class="flex flex-wrap justify-between w-64">
                                <span>{{ $imagen->getClientOriginalName() }}</span>
                                <svg wire:click="eliminarImagen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                      
                    @endif
                @enderror
            </div>

            <div class="grid lg:grid-cols-2 lg:grid-rows-2 lg:mt-0 mt-5 lg:ml-5">

                <livewire:organizador.talleres.crear.requisito.requisitos :requisitos='$requisitos' />

                <livewire:organizador.talleres.crear.protocolo.protocolos :protocolos='$protocolos' />



            </div>

            <div class="mt-4">
                <button type="submit"
                    class="border border-white rounded-full px-7 py-3 my-10 lg:my-0 hover:bg-white hover:text-primary">Solicitar
                    permiso</button>
            </div>

            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("validarNuevoTaller", () => {
        Swal.fire({
            title: '¿Esta seguro?',
            text: 'Se enviara una solicitud para aprobar el taller',
            icon: 'info',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar',
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emit('nuevoTallerConfirmado');

                Swal.fire({
                    title: 'Exito',
                    text: `Solicitud enviada con exito, recuerda
                    que debes esperar a que el administrador
                    apruebe la imagen`,
                    icon: 'success',
                    confirmButtonText: 'Confirmar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = '/organizador/mis-solicitudes';
                    }
                });
            }
        });
    });
</script>
