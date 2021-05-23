<div class="flex flex-col items-center justify-center mb-10">
    <span class="text-2xl text-white mb-4">¿Estás interesado/a?</span>
    <button data-fancybox data-src="#formulario-taller"
        class="bg-gradient-to-tr from-white via-black to-primary px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">Participar</button>
</div>
<div id="formulario-taller" class="hidden formulario-taller">

    <div class="flex flex-col items-center">
        <span class="lg:text-2xl border-b border-gray-900">Formulario de inscripción</span>
        <span>{{ $tallerSeleccionado->TAL_Nombre }}</span>
    </div>


    <form method='post' action='{{ route('taller.inscripcion') }}'>
        @csrf
        <div class="grid lg:grid-cols-2 gap-8 mt-8">
            <input id="idTaller" type="text" name="idTaller" class="rounded-full lg:w-40"
                value='{{ $tallerSeleccionado->id }}' hidden />

            <div class="flex flex-col">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" name="nombre" class="rounded-full lg:w-40" required />
            </div>

            <div class="flex flex-col">
                <label for="apellidos">Apellidos</label>
                <input id="apellidos" type="text" name="apellidos" class="rounded-full" required />
            </div>

            <div class="flex flex-col">
                <label for="email">Email</label>
                <input id="email" type="text" name="email" class="rounded-full w-full" required />
            </div>

            <div class="flex flex-col">
                <label for="telefono">Teléfono</label>
                <input id="telefono" type="tel" name="telefono" pattern="[0-9]{9}" class="rounded-full w-full"
                    required />
                <span>Ejemplo: 912345678</span>
            </div>
        </div>

        <div class="mt-10 flex justify-center">
            <button type='submit'
                class="bg-primary rounded-full text-white font-bold px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">
                Participar
            </button>
        </div>
    </form>
</div>