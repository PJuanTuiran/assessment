<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">

    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
    <div class="alert alert-success bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('message') }}
    </div>
    @endif

    <!-- Filtro de búsqueda y botón de Crear -->
    <div class="flex items-center justify-between mb-6">
        <input type="text" wire:model="search" placeholder="Buscar usuarios..." class="p-2 border rounded-md w-1/3" />
        <button wire:click="create" class="bg-blue  px-6 py-2 rounded-md  focus:outline-none focus:ring-2 focus:ring-blue-400">
            Crear Usuario
        </button>
    </div>

    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto mb-6">
        <table class="table-auto w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Correo</th>
                    <th class="px-4 py-2 border-b">Rol</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                    <td class="px-4 py-2 border-b">{{ $user->getRoleNames()->first() }}</td>
                    <td class="px-4 py-2 border-b">
                        <button wire:click="edit({{ $user->id }})" class="bg-blue-500 ">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="bg-red-500  px-4 py-2 rounded-md  ">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Formulario para crear o editar usuarios -->
    <div class="mt-6 bg-gray-50 p-6 rounded-lg shadow-sm">
        <h3 class="text-xl font-semibold mb-4">{{ $isEditing ? 'Editar' : 'Crear' }} Usuario</h3>

        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" id="name" wire:model="name" class="p-2 w-full border rounded-md mt-1" required />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo</label>
                <input type="email" id="email" wire:model="email" class="p-2 w-full border rounded-md mt-1" required />
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Rol</label>
                <select id="role" wire:model="role" class="p-2 w-full border rounded-md mt-1" required>
                    <option value="">Seleccione un rol</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Medico">Médico</option>
                    <option value="Paciente">Paciente</option>
                </select>
            </div>

            @if($isEditing)
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Nueva Contraseña (opcional)</label>
                <input type="password" id="password" wire:model="password" class="p-2 w-full border rounded-md mt-1" />
            </div>
            @endif

            <div class="mt-4">
                <button type="submit" class="bg-green-500  px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                    {{ $isEditing ? 'Actualizar' : 'Crear' }} Usuario
                </button>
            </div>
        </form>
    </div>
</div>