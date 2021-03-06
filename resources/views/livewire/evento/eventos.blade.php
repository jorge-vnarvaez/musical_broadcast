<div>
    <div class="py-5 min-h-screen w-full text-white ">
        <div class="bg-black bg-opacity-20 px-5 py-4">
            <div>
                <span class="text-4xl mb-8 block">
                    Eventos disponibles ({{ count($eventos) }})
                </span>
            </div>
            @if (count($eventos) > 0)
                <div class="gap-5">
                    <div>
                        <div class="swiper-container swiperEventos mb-5">
                            <div class="swiper-wrapper">
                                @foreach ($eventos as $evento)
                                    <livewire:evento.evento :evento='$evento' :slideActual="$loop->index" :wire:key='$evento->id' />
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <livewire:evento.evento-preview :eventoActual='$eventos[0]' :wire:key='$eventos[0]->id' />
                </div>
            @else
                <span class="text-white">Sin resultados</span>
            @endif
        </div>
    </div>
</div>

<script>
    var mySwiper = {};

    function initializeSwiper(slideActual) {
        mySwiper = new Swiper('.swiperEventos', {
            loop: false,
            grabCursor: true,
            slidePerView: 'auto',
            spaceBetween: 30,
            initialSlide: slideActual,
            breakpoints: {
                640: {
                    slidesPerView: 'auto',
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
            },
        });
    }

    window.addEventListener('mostrarEvento', (event) => {
        initializeSwiper(event.detail.slideActual);
    });

    window.onload = function() {
        initializeSwiper(0);
    }
</script>
