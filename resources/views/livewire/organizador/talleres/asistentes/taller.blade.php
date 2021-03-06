<div class="grid grid-cols-12 gap-20">
    <div class="lg:col-span-5 col-span-4">
        <div class="grid lg:grid-cols-2 grid-cols-12">
            <div class="mb-8 flex lg:flex-row lg:col-span-2 col-span-12 flex-col justify-between lg:items-center">
                <div class="flex flex-col">
                    <span class="text-2xl">{{ $taller->TAL_Nombre }}</span>
                    <span>Cupos restantes: {{ $taller->TAL_Aforo }}</span>
                </div>
                <div class="flex flex-col lg:mt-0 mt-4 lg:items-end">

                    <span>{{ $taller->TAL_Fecha }} {{ $taller->TAL_Hora }}</span>
                    @if ($taller->solicitudes[0]->estado == 5)
                        <div class="bg-pink-700 mt-1 rounded-full w-32 py-1 text-center justify-self-end">
                            <span class="text-white">Pospuesto</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-8 lg:col-span-2 col-span-12">
                <p>{{ $taller->TAL_Descripcion }}</p>
            </div>
        </div>

        <div class="flex lg:flex-row flex-col lg:justify-between col-span-2">
            <div>
                <span class="font-bold">REQUISITOS</span>
                @foreach ($taller->TAL_Requisitos as $requisito)
                    <p>{{ $requisito }}</p>
                @endforeach
            </div>

            <div class="lg:mt-0 mt-4">
                <span class="font-bold">PROTOCOLO COVID</span>
                @foreach ($taller->TAL_Protocolo as $protocolo)
                    <p>{{ $protocolo }}</p>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-12 col-span-4 mt-10 flex flex-col w-64 items-center">
            <span>¿Tienes problemas para llevar a cabo este taller?</span>
            <div>
                <button data-fancybox data-src="#posponerTallerForm"
                    class="mt-4 mr-4 bg-white text-primary px-5 py-2 rounded-lg">Posponer</button>
                <div id="posponerTallerForm" class="hidden bg-white lg:w-96 w-80">
                    <div>
                        <form wire:submit.prevent="posponerTaller" class="flex flex-col items-center">
                            <div class="flex flex-col items-center mb-2">
                                <span class="text-xl">Posponer taller</span>
                                <span>{{ $taller->TAL_Nombre }}</span>
                            </div>

                            <div class="flex flex-col items-center mb-5">
                                <span>Motivo</span>
                                <textarea maxlength='255'
                                    placeholder="Indique el motivo por el cuál está posponiendo el taller, de esta forma los asistentes serán informados (máximo 255 caracteres)"
                                    wire:model='observacion_pospuesto'
                                    class="resize-none lg:w-80 w-72 px-2 bg-primary h-40 text-white"></textarea>
                                @if ($errors)
                                    @foreach ($errors->all() as $message)
                                        <script>
                                            $.fancybox.close();
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'Complete los campos solicitados',
                                                icon: 'warning',
                                                timer: 4000,
                                            }).then((result) => {
                                                if (!result.isVisible) {
                                                    location.href = location.href;
                                                }
                                            });
                                        </script>
                                    @endforeach
                                @endif
                            </div>

                            <div class="flex flex-col items-center mb-5">
                                <span>Nueva fecha</span>
                                <div class="flex justify-between">
                                    <input type="date" wire:model="fecha" />
                                    <input type="time" wire:model="hora" />
                                </div>
                            </div>
                            <button type="submit"
                                class="mt-5 px-4 py-2 rounded-full bg-primary text-white hover:bg-primary hover:text-white">
                                Posponer
                            </button>
                        </form>
                    </div>
                </div>

                <button data-fancybox data-src="#cancelarTallerForm"
                    class="mt-4 bg-white text-primary px-5 py-2 rounded-lg">
                    Cancelar
                </button>
                <div id="cancelarTallerForm" class="hidden bg-white lg:w-96 w-80">
                    <div>
                        <form wire:submit.prevent="cancelarTaller" class="flex flex-col items-center">
                            <div class="flex flex-col items-center mb-2">
                                <span class="text-xl">Cancelar taller</span>
                                <span>{{ $taller->TAL_Nombre }}</span>
                            </div>

                            <div class="flex flex-col items-center mb-5">
                                <span>Motivo</span>
                                <textarea maxlength='255'
                                    placeholder="Indique el motivo por el cuál está posponiendo el taller, de esta forma los asistentes serán informados (máximo 255 caracteres)"
                                    wire:model='observacion_cancelado'
                                    class="resize-none w-72 px-10 bg-primary h-40 text-white"></textarea>
                            </div>


                            <button type="submit"
                                class="mt-5 px-4 py-2 rounded-full bg-primary text-white hover:bg-primary hover:text-white">
                                Cancelar taller
                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="lg:col-start-7 lg:col-span-4 col-start-1 col-span-4 lg:overflow-visible overflow-x-auto">
        @if (count($taller->asistentes) > 0)
            <table class="text-primary">
                <thead class="bg-gray-200">
                    <th class="px-8 py-2 ">Rut</th>
                    <th class="px-8 py-2">Nombre</th>
                    <th class="px-8 py-2">Email</th>
                    <th class="px-8 py-2">Teléfono</th>
                    <th class="px-8 py-2"></th>
                </thead>
                <tbody class="bg-gray-100">
                    @foreach ($taller->asistentes as $index => $asistente)
                        <tr>
                            <td class="px-4 py-2">{{ $asistente->rut }}</td>
                            <td class="px-4 py-2">{{ $asistente->nombre }} {{ $asistente->apellidos }}</td>
                            <td class="px-4 py-2">{{ $asistente->email }}</td>
                            <td class="px-4 py-2">{{ $asistente->telefono }}</td>
                            <td class="px-4 py-2">
                                <button wire:click="eliminar('{{ $index }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-red-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span>Oops!! Nadie se ha inscrito aún, ten paciencia :D</span>
        @endif
    </div>
</div>

<script>
    window.addEventListener("eliminarAsistente", function() {
        Swal.fire({
            title: 'Eliminar participante ¿Está seguro?',
            text: `No podrás volver a inscribir a este participante por tu cuenta
            y se le notificará que ya no formará parte del taller.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit("eliminarAsistenteConfirmado");
                Swal.fire({
                    title: "Asistente eliminado",
                    text: 'Se ha eliminado al asistente',
                    icon: 'success',
                    timer: 2000,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = location.href;
                    }
                })
            }
        });
    });

    window.addEventListener("posponerTaller", function() {
        $.fancybox.close();
        Swal.fire({
            title: "¿Está seguro?",
            text: `Estas a punto de posponer el evento, 
            de modo que los asistentes y administradores serán informados con 
            la información que acabas de escribir`,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, posponer",
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit("posponerTallerConfirmado");
                Swal.fire({
                    title: 'Taller pospuesto',
                    icon: `success`,
                    timer: 3000
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = location.href;
                    }
                });
            }
        });
    });

    window.addEventListener("cancelarTaller", function() {
        $.fancybox.close();
        Swal.fire({
            title: "¿Está seguro?",
            text: `Estas a punto de cancelar el evento, 
            de modo que los asistentes y administradores serán informados con 
            la decisión que acabas de tomar.`,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit("cancelarTallerConfirmado");
                Swal.fire({
                    title: 'Taller cancelado',
                    icon: `success`,
                    timer: 3000
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = location.href;
                    }
                });
            }
        });
    });
</script>
