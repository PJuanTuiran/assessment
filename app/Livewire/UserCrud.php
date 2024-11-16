<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserCrud extends Component
{
    public $name, $email, $password, $password_confirmation, $role, $userId;
    public $isEditing = false; // Indica si estamos en modo de edición o creación
    public $search = ''; // Para filtrar la lista de usuarios

    // Reglas de validación


    // Método que se ejecuta al cargar el componente
    public function mount()
    {
        // Verificamos que el usuario autenticado tenga el rol de "Administrador"
        if (!auth()->user()->hasRole('Administrador')) {
            abort(403); // Abortamos si no tiene el rol adecuado
        }
    }

    // Método para renderizar la vista y mostrar los usuarios filtrados
    public function render()
    {
        // Filtramos los usuarios que coinciden con el término de búsqueda
        $users = User::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.user-crud', compact('users'))->layout('layouts.app');
    }

    // Prepara el formulario para crear un nuevo usuario
    public function create()
    {
        $this->resetInputFields(); // Limpiamos los campos del formulario
        $this->isEditing = false; // Establecemos que estamos creando un nuevo usuario
    }

    // Almacena un nuevo usuario
    public function store()
    {
        // Validamos los campos


        // Creamos el nuevo usuario
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), // Encriptamos la contraseña
        ]);

        // Asignamos el rol al usuario
        $user->assignRole($this->role);

        // Mostramos un mensaje de éxito
        session()->flash('message', 'Usuario creado exitosamente.');

        // Limpiamos los campos del formulario
        $this->resetInputFields();
    }

    // Carga los datos de un usuario para editarlo
    public function edit($userId)
    {
        // Establecemos que estamos en modo de edición
        $this->isEditing = true;

        // Cargamos los datos del usuario a editar
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first(); // Obtenemos el primer rol del usuario
    }

    // Actualiza los datos del usuario
    public function update()
    {
        // Validamos los campos
        $this->validate();

        // Encontramos el usuario a editar
        $user = User::findOrFail($this->userId);

        // Actualizamos los datos del usuario
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        // Sincronizamos el rol del usuario
        $user->syncRoles($this->role);

        // Mostramos un mensaje de éxito
        session()->flash('message', 'Usuario actualizado exitosamente.');

        // Limpiamos los campos del formulario
        $this->resetInputFields();
    }

    // Elimina un usuario
    public function delete($userId)
    {
        // Encontramos al usuario a eliminar
        $user = User::find($userId);

        // Si el usuario existe, lo eliminamos
        if ($user) {
            $user->delete();
            session()->flash('message', 'Usuario eliminado exitosamente.');
        }
    }

    // Limpiar los campos del formulario
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = '';
        $this->userId = '';
    }
}
