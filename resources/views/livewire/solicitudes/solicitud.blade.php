<div>
    <div class="w-96">

        <div class="bg-white rounded-br-lg rounded-tl-lg px-6 py-3">
            <span class="font-bold block">{{ $solicitud->taller->TAL_Nombre }}</span>
            <span class="font-bold text-xs">Organiza: </span>
            <span class="text-xs">{{ $solicitud->taller->organizador->nombre }}</span>
            <span class="text-xs">{{ $solicitud->taller->organizador->apellidos }}</span>
            <div class="flex flex-col mt-5 items-center">
                <span class="text-md">Estado </span>

                @if ($solicitud->estado == 0)
                    <div class="bg-yellow-300 rounded-full px-10 w-32"><span
                            class="text-xs text-purple-600">Pendiente</span> </div>
                @endif

                @if ($solicitud->estado == 1)
                    <div class="bg-pink-400 rounded-full px-10 w-32 "><span class="text-xs">Revisada</span>
                    </div>
                @endif
            </div>

            <div class="flex flex-col mt-3 items-center">
                <span class="text-md">Visualizar </span>
                <a class="hover:text-green-400" wire:click='mostrarSolicitud'><svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd" />
                    </svg></a>
            </div>
        </div>

    </div>
</div>