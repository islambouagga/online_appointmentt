<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCalendar\LivewireCalendar;
use Livewire\Component;

class AppointmentView extends LivewireCalendar
{
    public function render()
    {
        return view('livewire.appointment-view');
    }
}
