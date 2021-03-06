<div x-data="formularios()" class="col-span-8 my-5">
    <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
        <span class="top-5 mb-3 text-4xl font-bold">Agrega tus albums aquí</span>
    </div>
    <div class="flex flex-col items-center">
        <div class="flex flex-wrap justify-center content-center mt-5">
        @foreach ($albumes as $index => $album)

            <div class="flex mr-5">
                <button @click="open = true">
                    <div class="flex flex-col items-center">
                        <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $album['imagen'] }}"
                            class="rounded-full  h-32 w-32 " />
                        <span>{{ $album['ALB_Nombre'] }}</span>
                    </div>
                </button>
                <svg wire:click="eliminarAlbum('{{ $index }}')" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

        @endforeach
        <div>
            <button @click="abrir()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 hover:text-green-400 cursor-pointer"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>
        </div>
    </div>


    <div class="relative h-2 w-32 bg-cover rounded-full lg:rounded-t-full lg:rounded-1">
        <div x-show.transition.out="estaAbierto()" @click.away='cerrar()'
            class="bg-white absolute lg:left-54 -right-24 z-50 p-4 text-primary w-80 border-4 shadow-md">
            <div class="flex justify-between items-center">
                <span class="font-bold text-2xl block text-center mb-5">Agregar album.</span>
                <svg @click="cerrar()" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="mb-5">
                <label>Foto del album.</label>

                @error('imagenAlbum')
                    <label for="imagenAlbum">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 border-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </label>
                    <input type="file" wire:model="imagenAlbum" id="imagenAlbum" class="hidden" />
                    @error('imagenAlbum')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                @else
                    @if ($imagenAlbum)
                        <div class="flex mt-4">
                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $url }}" class="h-32 w-32 rounded-full" />
                            <svg wire:click="eliminarImagenAlbum" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    @else
                        <label for="imagenAlbum">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 border-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </label>
                        <input type="file" wire:model="imagenAlbum" id="imagenAlbum" class="hidden" />
                        @error('imagenAlbum')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @endif
                @enderror
                <div class="flex flex-col lg:justify-between mb-3">
                    <div wire:loading wire:target="imagenAlbum" class="bg-blue-100 w-64 text-blue-700 px-4" role="alert">
                        <p class="font-bold  py-1">Cargando imagen</p>
                    </div>
                </div>
            </div>

            <div class="mb-5 flex flex-col">
                <label for="nombreAlbum">Nombre del album</label>
                <input type="text" wire:model="nombreAlbum" class="mt-1" maxlength="30" required />
                @error('nombreAlbum')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 flex flex-col">
                <label for="fechaLanz">Fecha de lanzamiento del album</label>
                <input type="date" wire:model="fechaLanz" class="mt-1" required />
                @error('fechaLanz')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5 flex flex-col">
                <label for="nombreCancion">Nombre de la cancion</label>
                <div class="flex flex-col lg:mr-10">
                    <div class="flex mt-1">
                        <input class="bg-primary text-white placeholder-gray-300 border-0 p-0 px-2 w-36 mr-2"
                            type="text" wire:model='nombreCancion' wire:keydown.enter.prevent="nuevaCancion"
                            placeholder="Nueva Cancion" />
                        <a wire:click='nuevaCancion'>Agregar</a>
                    </div>
                    <ul class="mt-2 mb-2 text-primary">
                        @foreach ($canciones as $index => $cancion)
                            <div class="flex justify-between w-48">
                                <li>
                                    {{ $cancion['CAN_Nombre'] }}
                                </li>
                                <a wire:click="eliminarCancion('{{ $index }}')"
                                    class="flex text-black items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    </ul>
                    @error('canciones')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button wire:click="agregarAlbum" class="py-1 px-5 bg-primary text-white">Agregar</button>
        </div>
    </div>
    </div>
</div>


<div class="my-5 text-center"><span>¿No sabes cual/es albumes destacar?
        No te preocupes, si omites este paso más adelante
        podrás agregar albumes a tus artistas.</span>
</div>
</div>
