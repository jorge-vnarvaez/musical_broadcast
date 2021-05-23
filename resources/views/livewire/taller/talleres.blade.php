<div class="lg:grid lg:grid-cols-2 mt-10 container mx-auto">
    <div class='px-10'>
        <div class="flex">
            @can('organizar') <div>
                    <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">Crear taller</button>
                </div>
                <div>
                    <button class="bg-yellow-500 px-5 py-1 mb-5 text-white font-bold ml-5">Estado solicitudes</button>
                </div>
            @endcan
        </div>

        <div>
            <div class="swiper-container mySwiper mb-5">
                <div class="swiper-wrapper">
                    @foreach ($talleres as $taller)
                        <livewire:taller.taller :slideActual='$loop->index' :taller='$taller' :wire:key='$taller->id'>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

    <livewire:taller.taller-preview :tallerActual='$talleres[0]' :wire:key="$talleres[0]->id">

    

</div>