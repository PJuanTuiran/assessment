<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700 py-12 px-4 sm:px-6 lg:px-8">
        <!-- Logo de la Clínica -->
        <div class="flex items-center justify-center mb-8">
            <a href="/" class="flex flex-col items-center">
                <img src="{{ asset('images/logo-clinica.jpg') }}" alt="Clínica XYZ" class="w-24 h-24 rounded-full shadow-lg">
                <h1 class="text-3xl font-bold text-white mt-4">Clínica XYZ</h1>
            </a>
        </div>

        <!-- Tarjeta de Login -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Iniciar Sesión</h2>

            <!-- Mostrar errores de validación -->
            <x-validation-errors class="mb-4" />

            <!-- Mensaje de estado (Ejemplo: sesión expirada) -->
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <!-- Formulario de Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Campo de Email -->
                <div class="mb-4">
                    <x-label for="email" class="block text-sm font-medium text-gray-700" value="{{ __('Correo Electrónico') }}" />
                    <x-input id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <!-- Campo de Contraseña -->
                <div class="mb-4">
                    <x-label for="password" class="block text-sm font-medium text-gray-700" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Recordar Sesión -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                    @endif
                </div>

                <!-- Botón de Login -->
                <div class="mt-6">
                    <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Iniciar Sesión') }}
                    </button>
                </div>

                <!-- Enlace para Registrarse -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Regístrate aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>