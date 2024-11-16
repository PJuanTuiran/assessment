<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700 py-12 px-4 sm:px-6 lg:px-8">
        <!-- Logo Personalizado -->
        <div class="flex items-center justify-center mb-8">
            <a href="/" class="flex flex-col items-center">
                <img src="{{ asset('images/logo-clinica.jpg') }}" alt="Clínica XYZ" class="w-24 h-24 rounded-full shadow-lg">
                <h1 class="text-3xl font-bold text-white mt-4">Clínica XYZ</h1>
            </a>
        </div>

        <!-- Tarjeta de Registro -->
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Registrarse</h2>

            <!-- Mostrar errores de validación -->
            <x-validation-errors class="mb-4" />

            <!-- Formulario de Registro -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Campo de Nombre -->
                <div class="mb-4">
                    <x-label for="name" class="block text-sm font-medium text-gray-700" value="{{ __('Nombre') }}" />
                    <x-input id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <!-- Campo de Email -->
                <div class="mb-4">
                    <x-label for="email" class="block text-sm font-medium text-gray-700" value="{{ __('Correo Electrónico') }}" />
                    <x-input id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <!-- Campo de Contraseña -->
                <div class="mb-4">
                    <x-label for="password" class="block text-sm font-medium text-gray-700" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-4">
                    <x-label for="password_confirmation" class="block text-sm font-medium text-gray-700" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <!-- Términos y Condiciones -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <span class="ml-2 text-sm text-gray-600">
                                {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-blue-600 hover:text-blue-800">'.__('Términos de Servicio').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-blue-600 hover:text-blue-800">'.__('Política de Privacidad').'</a>',
                                ]) !!}
                            </span>
                        </div>
                    </x-label>
                </div>
                @endif

                <!-- Botón de Registro -->
                <div class="mt-6">
                    <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Registrarse') }}
                    </button>
                </div>

                <!-- Enlace para Iniciar Sesión -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Inicia sesión aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>