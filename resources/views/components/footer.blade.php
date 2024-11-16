<!-- resources/views/layouts/app.blade.php -->

<!-- Contenido Principal -->


<!-- Footer -->
<footer class="bg-gray-800 text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Sección de Enlaces -->
            <div>
                <h3 class="text-lg font-semibold">Enlaces Rápidos</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white">Inicio</a></li>
                    <li><a href="/acerca" class="text-gray-400 hover:text-white">Acerca de</a></li>
                    <li><a href="/contacto" class="text-gray-400 hover:text-white">Contacto</a></li>
                    <li><a href="/politicas" class="text-gray-400 hover:text-white">Políticas de Privacidad</a></li>
                </ul>
            </div>

            <!-- Sección de Redes Sociales -->
            <div>
                <h3 class="text-lg font-semibold">Síguenos</h3>
                <ul class="mt-4 space-y-2 flex space-x-4">
                    <li><a href="https://facebook.com" target="_blank" class="text-gray-400 hover:text-white">
                            <!-- Íconos de redes sociales -->
                        </a></li>
                    <li><a href="https://twitter.com" target="_blank" class="text-gray-400 hover:text-white">
                            <!-- Íconos de redes sociales -->
                        </a></li>
                    <li><a href="https://instagram.com" target="_blank" class="text-gray-400 hover:text-white">
                            <!-- Íconos de redes sociales -->
                        </a></li>
                </ul>
            </div>

            <!-- Sección de Información de Contacto -->
            <div>
                <h3 class="text-lg font-semibold">Contacto</h3>
                <ul class="mt-4 space-y-2">
                    <li><span class="text-gray-400">Teléfono: </span><span class="text-white">+1 234 567 890</span></li>
                    <li><span class="text-gray-400">Email: </span><span class="text-white">info@clinica.com</span></li>
                    <li><span class="text-gray-400">Dirección: </span><span class="text-white">Calle Ficticia 123, Ciudad</span></li>
                </ul>
            </div>

            <!-- Sección de Boletín Informativo -->
            <div>
                <h3 class="text-lg font-semibold">Boletín Informativo</h3>
                <p class="mt-4 text-gray-400">Recibe las últimas noticias y actualizaciones sobre nuestras consultas y servicios.</p>
                <form action="#" method="POST" class="mt-4">
                    <input type="email" name="email" placeholder="Tu correo electrónico" class="w-full px-4 py-2 text-gray-800 bg-white border rounded-md">
                    <button type="submit" class="mt-2 w-full bg-indigo-600 text-white py-2 rounded-md">Suscribirme</button>
                </form>
            </div>
        </div>

        <div class="mt-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>