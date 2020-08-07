<?php

namespace App\Http\Livewire;

use App\Appointment;
use App\User;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AppointmentsCalendar extends LivewireCalendar
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function events(): \Illuminate\Support\Collection
    {

        $zpp = Appointment::where("id", 1);
        $user =User::find(Auth::user()->id)  ;
//        dd($user);
//        dd((int)request()->id);
//        if ($user->usertable_type == 'Doctor'){
            return Appointment::query()
                ->where('doctor_id',(int)request()->id)
                ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
                ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
                ->get()
                ->map(function (Appointment $appointment) {
                    return [
                        'id' => $appointment->id,
                        'title' => $appointment->title,
                        'description' => $appointment->notes,
                        'date' => $appointment->scheduled_at,
                    ];
                });
//        }

    }
}
