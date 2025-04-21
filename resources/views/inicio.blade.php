
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800 ">
    <div class="flex justify-center items-center h-screen">

        <button onclick="window.location='{{ route('productos.index') }}'" type="button"
        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-5xl px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-[500px] h-[300px]">Iniciar
        compra</button>
    </div>

</body>

</html>
