<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Citas - Clínica XYZ</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased flex flex-col min-h-screen">
    <!-- Header -->
    <header class="w-full bg-blue-600 text-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Clínica XYZ - Gestión de Citas</h1>
            @if (Route::has('login'))
            <div class="flex items-center space-x-4">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-white hover:text-gray-200">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Iniciar Sesión</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-white hover:text-gray-200">Registrarse</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto flex-1 py-10">
        <!-- Sección de Introducción -->
        <section class="mb-10 text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Bienvenido a la Clínica XYZ</h2>
            <p class="text-gray-600">La mejor atención médica al alcance de un clic. Programa y gestiona tus citas de manera fácil y rápida.</p>
        </section>

        <!-- Sección de Características -->
        <section class="mb-10 grid gap-8 lg:grid-cols-3">
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-2">Gestión de Citas</h3>
                <p class="text-gray-600">Reserva, edita y cancela tus citas médicas de forma rápida y segura desde cualquier dispositivo.</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-2">Historial Médico</h3>
                <p class="text-gray-600">Accede al historial de citas y a la información médica relevante de cada paciente de manera organizada.</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-2">Notificaciones en Tiempo Real</h3>
                <p class="text-gray-600">Recibe notificaciones sobre tus próximas citas y recordatorios importantes.</p>
            </div>
        </section>

        <!-- Sección de Testimonios -->
        <section class="mb-10">
            <h3 class="text-2xl font-semibold text-center mb-6">Lo que dicen nuestros pacientes</h3>
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <p class="text-gray-700">"El sistema de citas es muy fácil de usar y me ayudó a organizar mejor mi tiempo. ¡Excelente servicio!"</p>
                    <p class="text-right text-gray-500">- Juan Pérez</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <p class="text-gray-700">"Me encanta poder ver mi historial médico y programar mis citas con solo unos clics. Muy conveniente."</p>
                    <p class="text-right text-gray-500">- María López</p>
                </div>
            </div>
        </section>

        <!-- Sección de Contacto -->
        <section class="mb-10 text-center">
            <h3 class="text-2xl font-semibold mb-4">Contáctanos</h3>
            <p class="text-gray-600 mb-4">Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nosotros.</p>
            <a href="mailto:contacto@clinica.xyz" class="text-blue-600 hover:text-blue-800">contacto@clinica.xyz</a>
        </section>
    </main>

    <!-- Footer -->
    <footer class="w-full bg-blue-600 text-white py-6">
        <div class="container mx-auto text-center">
            <p>© 2024 Clínica XYZ. Todos los derechos reservados.</p>
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>
</body>

</html>