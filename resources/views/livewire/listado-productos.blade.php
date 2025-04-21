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
            {{$resultadoBusqueda}}
            {{$producto}}
            @if ($resultadoBusqueda != '')

                @foreach ($resultadoBusqueda as $producto)
                    <tr>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->denominacion }}</td>
                        <td>{{ $producto->precio }}</td>


                    </tr>
                @endforeach
            @endif

        </table>
    </div>

</div>
