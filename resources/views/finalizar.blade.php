<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800 ">
    <h2>Ventana de pago</h2>
    <div class="flex flex-col justify-center items-center">
        <label for="">Total: </label>
        <p class="m-6">{{ $total }} euros</p>

        <form action="{{ route('tickets.store') }}" method="post">
            @csrf
            <label for="">Número de tarjeta</label>
            <input type="text" name="tarjeta" id="">
            <button type="submit">Enviar</button>
        </form>
    </div>


</body>

</html>
