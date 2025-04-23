<div>
    @vite('resources/css/app.css') <!-- Esto es esencial -->
    @livewireStyles
    <div>
        <label for="producto">Codigo</label>
        <input type="text" name="codigo" id="codigo" wire:model.live="producto"
            class="border-2 border-gray-300 rounded-md p-2">
    </div>

    <div class="flex gap-28">
        <table>
            <tr>
                <thead>
                    <th>Codigo</th>
                    <th>Denominacion</th>
                    <th>Precio unitario</th>
                </thead>
            </tr>

            @foreach ($resultadoBusqueda as $producto)
                <tr>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->denominacion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        <button
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            wire:click="anyadir({{ $producto->id }})">Añadir
                        </button>
                    </td>

                </tr>
            @endforeach

        </table>
        <div>
            <label for="producto">Lista</label>
            <table>
                <tr>
                    <thead>
                        <th>Denominacion</th>
                        <th>Precio unitario</th>
                    </thead>
                </tr>
                @php
                    $subtotal = 0;
                @endphp
                @foreach ($lista as $indice => $producto)
                    <tr>
                        {{-- @php
                        
                        dd($producto);
                    @endphp --}}

                        <td>{{ $producto->denominacion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>
                            <button
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-green-800"
                                wire:click="eliminar({{ $indice }})">Eliminar
                            </button>
                        </td>
                        @php
                            $subtotal += $producto->precio;
                        @endphp



                    </tr>
                @endforeach
            </table>
            <div class="flex gap-4 m-7">
                <label for="">Subtotal: </label>
                <p>{{ $subtotal }} euros</p>
            </div>
            <div>

                <button wire:click="anular()"
                    class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-green-800">Anular
                    compra
                </button>

                <form action="{{ route('finalizar') }}" method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{ $subtotal }}">
                    <button class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-green-800">Finalizar
                        compra
                    </button>
                </form>
            </div>
        </div>

    </div>
    @livewireScripts
</div>
