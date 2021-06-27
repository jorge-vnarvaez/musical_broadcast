<div class="min-h-screen gap-5 text-white py-4 flex-col">
    <div class="col-span-8">
        <div class="col-span-8">
            <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                <span class="top-5 mb-2 text-4xl font-bold">Agrega el nombre del artista</span>
            </div>
            <div class="flex justify-center py-1 mt-5">
                <input type="text" wire:model="artista.ART_Nombre" id="nombreArtista"
                    placeholder="Escribe el nombre del artista"
                    class="bg-white h-14 px-5 w-96 focus:outline-none rounded-full text-black">
            </div>
        </div>


        <div id="contenedor-modificar-artista">
            <div>
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center mt-5">
                    <span class="mb-3 text-4xl font-bold">Tus generos</span>
                </div>

                <div class="swiper-container swiperGenerosArtista mt-5" wire:ignore>
                    <div class="swiper-wrapper">
                        @foreach ($generos_actuales as $index => $genero)
                            <div class="swiper-slide flex flex-col items-center">
                                <div class="flex items-center genero">
                                    <input type="checkbox" value="{{ $genero->id }}"
                                        wire:model="generosSeleccionados.{{ $index }}"
                                        class="opacity-0 absolute w-32 h-32 rounded-full" />
                                    <div
                                        class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                        <img src="https://tailwindcss.com/img/card-left.jpg"
                                            class="rounded-full w-28 h-28" />
                                    </div>
                                </div>
                                <span>{{ $genero->GEN_Nombre }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center mt-5">
                    <span class="mb-3 text-4xl font-bold">Escoge un genero</span>
                </div>

                <div class="swiper-container swiperGenerosArtista mt-5" wire:ignore>
                    <div class="swiper-wrapper">
                        @foreach ($generos as $index => $genero)
                            <div class="swiper-slide flex flex-col items-center">
                                <div class="flex items-center genero">
                                    <input type="checkbox" value="{{ $genero->id }}"
                                        wire:model="generosSeleccionados.{{ $index }}"
                                        class="opacity-0 absolute w-32 h-32 rounded-full" />
                                    <div
                                        class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                        <img src="https://tailwindcss.com/img/card-left.jpg"
                                            class="rounded-full w-28 h-28" />
                                    </div>
                                </div>
                                <span>{{ $genero->GEN_Nombre }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div>
                <div class="flex flex-col justify-center my-4">
                    <span class="text-2xl font-bold text-center mt-4">Estilos</span>
                    <span class="text-center">
                        Por favor selecciona uno o más estilos que representen a tu artista
                    </span>
                </div>

                <div class="flex justify-center">
                    @foreach ($artista->estilos as $index => $estilo)
                        <div class="flex flex-col items-center">
                            <div class="flex items-center mb-2 genero">
                                <input type="checkbox" value="{{ $estilo['id'] }}"
                                    wire:model="estilosSeleccionados.{{ $index }}"
                                    class="opacity-0 absolute w-32 h-32 rounded-full" />
                                <div
                                    class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                    <img src="https://tailwindcss.com/img/card-left.jpg"
                                        class="rounded-full w-28 h-28" />
                                </div>
                            </div>
                            <span>{{ $estilo['EST_Nombre'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Tipo artista-->
            <div class="col-span-8 justify-center mt-5">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="mb-3 text-4xl font-bold">Cuentanos ¿que tipo de artista eres?</span>
                </div>

                <div class="flex justify-center gap-5 mt-5">
                    <div class="flex flex-col items-center genero">
                        <input type="radio" wire:model="artista.tipo_artista" value="1"
                            class="h-32 w-32 opacity-0 absolute w-32 h-32 rounded-full" />
                        <div
                            class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                            <img src="https://tailwindcss.com/img/card-left.jpg" class="rounded-full w-28 h-28" />
                        </div>
                        <span>Solista</span>
                    </div>

                    <div class="flex flex-col items-center genero">
                        <input type="radio" wire:model="artista.tipo_artista" value="2"
                            class="h-32 w-32 opacity-0 absolute w-32 h-32 rounded-full" />
                        <div
                            class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                            <img src="https://tailwindcss.com/img/card-left.jpg" class="rounded-full w-28 h-28" />
                        </div>
                        <span>Banda</span>
                    </div>
                </div>
            </div>

            <!-- Imagen artista -->
            <div class=" col-span-8 align-content-center my-5">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Sube la imagen del artista</span>
                </div>
                <div class="flex justify-center gap-5 mt-5">
                    @if ($artista->imagen)
                        <img src="{{ asset('/storage/' . $artista->imagen) }}" class="rounded-full w-32 h-32" />
                        <svg wire:click="eliminarImagenArtista" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    @else
                        <div class="w-80 flex flex-col items-center">
                            <label for="imagenArtista">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-32 w-32 hover:text-green-400 cursor-pointer" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </label>
                            <input type="file" wire:model="imagenArtista" id="imagenArtista" class="hidden" />
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-span-8 align-content-center">
                <div class="bg-black bg-opacity-20 px-2 text-center">
                    <span class="my-3 text-4xl font-bold">Agrega tu biografía</span>
                </div>
                <div class=" text-center">

                    <div class="flex py-2 justify-center my-5 gap-16">
                        <textarea placeholder="Agrega la biografía del artista" wire:model="artista.biografia"
                            maxlength="2000"
                            class="border-2 lg:w-96 w-80 bg-white h-48 mt-1 mb-1 text-primary"></textarea>

                    </div>
                    <span class="items-center">{{-- $caracteres_biografia --}} / 2000</span>

                </div>

            </div>

            <!-- Albumes -->
            <livewire:representante.artista.crear.album.album :albumes="$artista->albumes"
                :nombreArtista="$artista->ART_Nombre" />
            <!-- Integrantes -->
            @if ($artista->tipo_artista == 2)
                <livewire:representante.artista.crear.integrantes.nuevo-integrante
                    :nombreArtista="$artista->ART_Nombre" />
            @endif


            <!-- Redes sociales -->
            <div class="lg:col-span-8">
                <div class="bg-black bg-opacity-20 px-2 text-center">
                    <span class="my-3 text-4xl font-bold">Redes sociales del artista</span>
                </div>

                <div class="my-5">
                    <div class="flex  justify-between py-2">
                        <span class="mb-3 text-2xl justify-self-start font-bold mt-2">Instagram</span>
                        <div class="flex flex-col">
                            <input type="text" wire:model="artista.instagram"
                                placeholder="Pega la URL del perfil del artista de instagram"
                                class="bg-white h-14 px-5 lg:w-96 focus:outline-none rounded-full text-black">
                            @error('instagram')
                                <span class="block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-between py-2">
                        <span class="mb-3 text-2xl font-bold mt-2">Facebook</span>
                        <div class="flex flex-col">
                            <input type="text" wire:model="artista.facebook"
                                placeholder="Pega la URL del perfil del artista de facebook"
                                class="bg-white h-14 px-5 lg:w-96 focus:outline-none rounded-full text-black">
                            @error('facebook')
                                <span class="block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-between py-2">
                        <span class="mb-3 text-2xl font-bold mt-2">Twitter</span>
                        <div class="flex flex-col">
                            <input type="text" wire:model="artista.twitter"
                                placeholder="Pega la URL del perfil del artista de twiter"
                                class="bg-white h-14 px-5 lg:w-96 focus:outline-none rounded-full text-black">
                            @error('twitter')
                                <span class="block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-span-8">
                <div class="bg-black bg-opacity-20 px-2 py-1 mt-5 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Canales de musica</span>
                </div>

                <div class="flex justify-between py-2 mt-5">
                    <span class="mb-3 text-2xl font-bold mt-2">Spotify</span>
                    <div class="flex flex-col">
                        <input type="text" wire:model="artista.spotify"
                            placeholder="Pega la URL del perfil del artista de spotify"
                            class="bg-white h-14 px-5 lg:w-96 focus:outline-none rounded-full text-black">
                        @error('spotify')
                            <span class="block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between py-2 mt-5">
                    <span class="top-5 mb-3 text-2xl font-bold mt-2">Youtube</span>
                    <div class="flex flex-col">
                        <div class="flex ">

                            <div x-data="{ open: false }">
                                <div x-on:mouseover="open = true" x-on:mouseout="open = false">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            <a href="https://www.youtube.com/account_advanced"></a>
                                        </svg>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false "
                                    class="bg-white absolute lg:right-52 p-4 text-primary lg:w-96"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 transform scale-100"
                                    x-transition:leave-end="opacity-0 transform scale-90">
                                    <div class="mb-5 flex flex-col">
                                        <img src="/youtube.PNG" class="w-96 rounded-full  " />
                                    </div>
                                </div>
                            </div>
                            <input type="text" wire:model="artista.youtube"
                                placeholder="Pega el ID del canal de youtube del artisa"
                                class="bg-white h-14 px-5 lg:w-96 focus:outline-none rounded-full text-black">
                        </div>
                        @error('youtube')
                            <span class="block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="col-span-8 flex justify-center mt-10">
                <button wire:click='validarAgregarArtista' class="bg-white text-primary py-2 px-8">
                    <span class="text-2xl">Agregar artista</span>
                </button>
            </div>

            <div class="mt-10 flex justify-center">
                @if ($errors)
                    @foreach ($errors->all() as $message)
                        <span class="text-red-400">{{ $message }}</span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('solicitudAgregarArtista', () => {
        Swal.fire({
            title: 'Solicitar permiso para agregar artista',
            text: `Se enviara una solicitud a los administradores
            con la información que nos acaba de proporcionar.`,
            icon: 'success',
            showCancelButton: true,
            cancelButtonText: 'Regresar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Solicitar permiso',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('agregarArtista');

                Swal.fire({
                    title: 'Solicitud enviada',
                    text: `Se ha enviado la solicitud, en cuanto se haya aprobado
                    recibirá un mensaje al correo asociado a su cuenta.`,
                    icon: 'success',
                    timer: 6000,
                    showConfirmButton: true,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "/representante/tus-artistas";
                    }
                });
            }
        });
    });


    function formularios() {
        return {
            abrir() {
                this.show = true;

            },
            cerrar() {
                this.show = false;
            },
            estaAbierto() {
                return this.show === true;
            },
        }
    }

    function initializeSwiper() {
        let swiper = new Swiper(".swiperGenerosArtista", {
            slidesPerView: 2,
            breakpoints: {
                1024: {
                    slidesPerView: 5,
                }
            }
        });
    }

    window.addEventListener('onContentChanged', (event) => {
        initializeSwiper();
    });

    window.onload = function() {
        initializeSwiper();
    }
</script>
