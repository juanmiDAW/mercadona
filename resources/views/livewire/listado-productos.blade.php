<div>
    @vite('resources/css/app.css') <!-- Esto es esencial -->
    @livewireStyles

    @if($modal)


        <div id="authentication-modal"
            class="fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Introduce el número de tarjeta
                        </h3>
                        <button type="button" wire:click="mostrarModal"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form wire:submit.prevent="anyadirTarjeta" class="space-y-4" action="">
                            <div>
                                <label for="tarjeta"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero de
                                    tarjeta</label>
                                <input type="text" name="tarjeta" id="tarjeta" wire:model="tarjeta"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="name@company.com" required />
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
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
                    <button wire:click="anular"
                        class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-green-800">Anular
                        compra
                    </button>
                    <button wire:click="mostrarModal"
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-green-800">Finalizar
                        compra
                    </button>
                </div>
            </div>

        </div>
    @endif
    @livewireScripts
</div>
