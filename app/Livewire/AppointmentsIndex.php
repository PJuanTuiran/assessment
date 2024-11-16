<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppointmentsIndex extends Component
{
    public $search = '';  // Para buscar por paciente, médico o motivo
    public $patient_id, $doctor_id, $date_time, $status, $reason, $appointmentId;
    public $isEditing = false;  // Para distinguir entre crear y editar

    public function render()
    {
        // Filtra las citas según la búsqueda
        $appointments = Appointment::where('reason', 'like', '%' . $this->search . '%')
            ->orWhereHas('patient', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('doctor', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();

        // Obtener lista de médicos y pacientes
        $patients = User::role('Paciente')->get();
        $doctors = User::role('Medico')->get();

        return view('livewire.appointments-index', compact('appointments', 'patients', 'doctors'))->layout('layouts.app');
    }

    // Método para crear o editar una cita
    public function saveAppointment()
    {
        // Validamos los datos
        $this->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'date_time' => 'required|date',
            'status' => 'required|string',
            'reason' => 'required|string',
        ]);

        // Si estamos editando, actualizamos la cita, si no, la creamos
        if ($this->isEditing) {
            $appointment = Appointment::find($this->appointmentId);
            $appointment->update([
                'patient_id' => $this->patient_id,
                'doctor_id' => $this->doctor_id,
                'date_time' => $this->date_time,
                'status' => $this->status,
                'reason' => $this->reason,
            ]);
            session()->flash('message', 'Cita actualizada correctamente.');
        } else {
            Appointment::create([
                'patient_id' => $this->patient_id,
                'doctor_id' => $this->doctor_id,
                'date_time' => $this->date_time,
                'status' => $this->status,
                'reason' => $this->reason,
            ]);
            session()->flash('message', 'Cita creada correctamente.');
        }

        // Resetear los campos
        $this->resetFields();
    }

    // Método para editar una cita existente
    public function editAppointment($appointmentId)
    {
        $this->isEditing = true;
        $appointment = Appointment::find($appointmentId);

        $this->appointmentId = $appointment->id;
        $this->patient_id = $appointment->patient_id;
        $this->doctor_id = $appointment->doctor_id;
        $this->date_time = $appointment->date_time;
        $this->status = $appointment->status;
        $this->reason = $appointment->reason;
    }

    // Método para eliminar una cita
    public function deleteAppointment($appointmentId)
    {
        Appointment::find($appointmentId)->delete();
        session()->flash('message', 'Cita eliminada correctamente.');
    }

    // Método para cancelar una cita
    public function cancelAppointment($appointmentId)
    {
        $appointment = Appointment::find($appointmentId);
        $appointment->update(['status' => 'cancelada']);
        session()->flash('message', 'Cita cancelada correctamente.');
    }

    // Resetear los campos
    public function resetFields()
    {
        $this->patient_id = '';
        $this->doctor_id = '';
        $this->date_time = '';
        $this->status = '';
        $this->reason = '';
        $this->isEditing = false;
        $this->appointmentId = null;
    }
}
