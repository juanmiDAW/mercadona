<div>
    <div>
        <label for="producto">Codigo</label>
        <input type="text" name="codigo" id="codigo" wire:model.live="producto">
    </div>

    <div>
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
                        <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Añadir</button>
                    </td>


                </tr>
            @endforeach
            {{-- @endif --}}

        </table>
    </div>

</div>
