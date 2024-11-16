<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-3xl font-bold text-gray-900">Bienvenido</h1>

    <p class="mt-4 text-lg text-gray-600">
        Aquí podrás administrar tus citas, consultar tu historial y explorar otras herramientas útiles. ¡Todo a tu alcance!
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 p-6 lg:p-8">
    <!-- Sección de Citas Próximas -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-8 h-8 text-green-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/citas/proximas" class="hover:text-green-600">Citas Próximas</a>
            </h2>
        </div>
        <p class="mt-4 text-gray-500 text-sm">
            Revisa tus próximas citas programadas. Aquí podrás ver la hora, el lugar y el profesional asignado.
        </p>
        <p class="mt-4 text-sm">
            <a href="/citas/proximas" class="inline-flex items-center font-semibold text-green-700">
                Ver mis citas

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-green-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Sección de Historial de Citas -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-8 h-8 text-indigo-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/citas/historial" class="hover:text-indigo-600">Historial de Citas</a>
            </h2>
        </div>
        <p class="mt-4 text-gray-500 text-sm">
            Accede al registro de todas tus citas anteriores. Consulta detalles, resultados y más.
        </p>
        <p class="mt-4 text-sm">
            <a href="/citas/historial" class="inline-flex items-center font-semibold text-indigo-700">
                Ver historial

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Sección de Agendar Cita -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-8 h-8 text-yellow-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                <a href="/citas/agendar" class="hover:text-yellow-500">Agendar una Cita</a>
            </h2>
        </div>
        <p class="mt-4 text-gray-500 text-sm">
            ¿Necesitas una cita? Agenda tu consulta médica en pocos pasos. ¡Es rápido y fácil!
        </p>
        <p class="mt-4 text-sm">
            <a href="/citas/agendar" class="inline-flex items-center font-semibold text-yellow-700">
                Agendar ahora

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-yellow-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>

    <!-- Sección de Notificaciones -->
    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-8 h-8 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4v16a2 2 0 002 2h14a2 2 0 002-2V4H3z" />
            </svg>
            <h2 class="ms-3 text-xl font-semibold text-gray-900">Notificaciones</h2>
        </div>
        <p class="mt-4 text-gray-500 text-sm">
            Mantente al tanto de nuevas citas, cambios en tu horario y otros recordatorios importantes.
        </p>
        <p class="mt-4 text-sm">
            <a href="/notificaciones" class="inline-flex items-center font-semibold text-red-700">
                Ver notificaciones

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-red-500">
                    <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </p>
    </div>
</div>