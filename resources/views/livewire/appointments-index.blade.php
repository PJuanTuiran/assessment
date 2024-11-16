<div>
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('message') }}
    </div>
    @endif

    <!-- Filtro de búsqueda -->
    <div class="mb-4">
        <input type="text" wire:model="search" class="p-2 border rounded-md w-full" placeholder="Buscar por paciente, médico o motivo">
    </div>

    <!-- Tabla de citas -->
    <table class="table-auto w-full text-left border-collapse mx-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b text-center">Paciente</th>
                <th class="px-4 py-2 border-b text-center">Médico</th>
                <th class="px-4 py-2 border-b text-center">Fecha</th>
                <th class="px-4 py-2 border-b text-center">Estado</th>
                <th class="px-4 py-2 border-b text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b text-center">{{ $appointment->patient->name }}</td>
                <td class="px-4 py-2 border-b text-center">{{ $appointment->doctor->name }}</td>
                <td class="px-4 py-2 border-b text-center">{{ $appointment->date_time }}</td>
                <td class="px-4 py-2 border-b text-center">{{ $appointment->status }}</td>
                <td class="px-4 py-2 border-b text-center">
                    <button wire:click="editAppointment({{ $appointment->id }})" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Editar</button>
                    <button wire:click="deleteAppointment({{ $appointment->id }})" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 ml-2">Eliminar</button>
                    <button wire:click="cancelAppointment({{ $appointment->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-700 ml-2">Cancelar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Formulario para crear o editar citas -->
    <div class="mt-6 bg-gray-50 p-6 rounded-lg shadow-sm">
        <h3 class="text-xl font-semibold mb-4">{{ $isEditing ? 'Editar' : 'Crear' }} Cita</h3>

        <form wire:submit.prevent="saveAppointment">
            <div class="mb-4">
                <label for="patient_id" class="block text-gray-700">Paciente</label>
                <select id="patient_id" wire:model="patient_id" class="p-2 w-full border rounded-md mt-1" required>
                    <option value="">Selecciona un paciente</option>
                    @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="doctor_id" class="block text-gray-700">Médico</label>
                <select id="doctor_id" wire:model="doctor_id" class="p-2 w-full border rounded-md mt-1" required>
                    <option value="">Selecciona un médico</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="date_time" class="block text-gray-700">Fecha y hora</label>
                <input type="datetime-local" id="date_time" wire:model="date_time" class="p-2 w-full border rounded-md mt-1" required />
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Estado</label>
                <select id="status" wire:model="status" class="p-2 w-full border rounded-md mt-1" required>
                    <option value="confirmada">Confirmada</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="reason" class="block text-gray-700">Motivo</label>
                <textarea id="reason" wire:model="reason" class="p-2 w-full border rounded-md mt-1" required></textarea>
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-700 mt-4">
                {{ $isEditing ? 'Actualizar' : 'Crear' }} Cita
            </button>
        </form>
    </div>
</div>