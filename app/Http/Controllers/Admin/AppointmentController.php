<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Doctor;
use App\Establishment;
use App\Evant;
use App\Http\Controllers\Controller;
use App\Patient;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctor = Doctor::findOrFail((int)request()->id);
        $days = $doctor->days()->get();
        foreach ($days as $day) {
            $arrdays[] = $day->day;
        }
        $appointments = $doctor->appointments()->get();
        $arrapp=[];
        foreach ($appointments as $ap ){
            if ($ap->statu=="request"){
                $arrapp []= $ap;
            }
        }

        foreach ($appointments as $ap) {
            $MWTStart = strtotime($ap->start);
            $Time = date("H:i", strtotime('+0 minutes', $MWTStart));
            $arrapps[] = $Time;
        }


if (Auth::check()){
    if (Auth::user()->usertable_type == 'Admin') {
        return view('admin.appointment.index')->with('doctor_id', (int)request()->id);
    }

    elseif (Auth::user()->usertable_type == 'Doctor') {
        return view('admin.appointment.index')->with('doctor_id', (int)request()->id)->with('appointments',$arrapp)
            ->with('arrdays', $arrdays);
    }elseif (Auth::user()->usertable_type == 'Patient'){
        return view('patient.appointment.index')->with('doctor_id', (int)request()->id)->with('doctor', Doctor::findOrFail((int)request()->id))
            ->with('arrdays', $arrdays);
    }
}
else{
            return view('patient.appointment.index')->with('doctor_id', (int)request()->id)->with('doctor', Doctor::findOrFail((int)request()->id))
                ->with('arrdays', $arrdays);
        }






    }

    public function getappointments($id)
    {

        $doctor = Doctor::findOrFail($id);
        $co=0;
        $appointments = $doctor->appointments()->get();
//        dd($appointments);
        foreach ($appointments as $ap ){
            if ($ap->statu=="changed" or $ap->statu=="approved"){
                $arrapp []= $ap;
            }
        }
//        dd($arrapp);
        return json_encode($arrapp);

    }

    public function getdays($id, $day)
    {
//dd("ezez");
        $doctor = Doctor::findOrFail($id);
        $app = $doctor->appointments()->get();
        ;
     if (count($app)!=0){
//         dd('11');
         foreach ($app as $p) {
             $d = new DateTime($p->start);

             if ($d->format('l') == $day) {
                 $apparr[] = $p;
             }else{
                 $apparr = [];
             }
         }

         if (count($apparr) !=0){
             foreach ($apparr as $ap) {
                 $MWTStart = strtotime($ap->start);
                 $Time = date("H:i", strtotime('+0 minutes', $MWTStart));
                 $arrapps2[] = $Time;
             }

             $MWTStart = strtotime($doctor->MWTStart);
             $MWTEnd = strtotime($doctor->MWTEnd);
             $EWTStart = strtotime($doctor->EWTStart);
             $EWTEnd = strtotime($doctor->EWTEnd);

             while ($MWTStart < $MWTEnd) {
                 $Time = date("H:i", strtotime('+0 minutes', $MWTStart));

                 $timess[] = $Time;
                 $Time = date("H:i", strtotime('+30 minutes', $MWTStart));
                 $MWTStart = strtotime($Time);

             }
             while ($EWTStart < $EWTEnd) {
                 $Time = date("H:i", strtotime('+0 minutes', $EWTStart));

                 $timess[] = $Time;
                 $Time = date("H:i", strtotime('+30 minutes', $EWTStart));
                 $EWTStart = strtotime($Time);

             }
             foreach ($arrapps2 as $ap) {
                 if (in_array($ap, $timess)) {
                     $timess = \array_diff($timess, [$ap]);
                 }
             }
             return json_encode($timess);
         }else{
             $MWTStart = strtotime($doctor->MWTStart);
             $MWTEnd = strtotime($doctor->MWTEnd);
             $EWTStart = strtotime($doctor->EWTStart);
             $EWTEnd = strtotime($doctor->EWTEnd);

             while ($MWTStart < $MWTEnd) {
                 $Time = date("H:i", strtotime('+0 minutes', $MWTStart));

                 $timess[] = $Time;
                 $Time = date("H:i", strtotime('+30 minutes', $MWTStart));
                 $MWTStart = strtotime($Time);

             }
             while ($EWTStart < $EWTEnd) {
                 $Time = date("H:i", strtotime('+0 minutes', $EWTStart));

                 $timess[] = $Time;
                 $Time = date("H:i", strtotime('+30 minutes', $EWTStart));
                 $EWTStart = strtotime($Time);

             }
             return json_encode($timess);
         }

     }else {
//         dd('222');
         $MWTStart = strtotime($doctor->MWTStart);
         $MWTEnd = strtotime($doctor->MWTEnd);
         $EWTStart = strtotime($doctor->EWTStart);
         $EWTEnd = strtotime($doctor->EWTEnd);

         while ($MWTStart < $MWTEnd) {
             $Time = date("H:i", strtotime('+0 minutes', $MWTStart));

             $timess[] = $Time;
             $Time = date("H:i", strtotime('+30 minutes', $MWTStart));
             $MWTStart = strtotime($Time);

         }
         while ($EWTStart < $EWTEnd) {
             $Time = date("H:i", strtotime('+0 minutes', $EWTStart));

             $timess[] = $Time;
             $Time = date("H:i", strtotime('+30 minutes', $EWTStart));
             $EWTStart = strtotime($Time);

         }
         return json_encode($timess);
     }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function postappointment(Request $request, Appointment $appointment)
    {

//        dd($request->all());
        $appointment->title = $request->title;
        $appointment->backgroundColor = $request->backgroundColor;
        $appointment->borderColor = $request->borderColor;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->statu= $request->statu;
        if ($request->allDay=='false'){
            $appointment->allDay = 0;
        }else{
            $appointment->allDay = 1;
        }

        $doctor = Doctor::findOrFail($request->doctor_id);
        $etbalisment = Establishment::findOrFail($doctor->establishment_id);


        if ($request->patient_id != "000"){

            $patient =  Patient::findOrFail($request->patient_id);

            $appointment->patient_id=$patient->id;
            $appointment->patient()->associate($patient);
            $appointment->establishment_id=$etbalisment->id;
            $appointment->establishment()->associate($etbalisment);
        }elseif($request->patient_id == "000"){

            $patient =  new Patient();
            $patient->Pfname=$request->Pfname;
            $patient->Ptel= $request->Ptel;
            $patient->Psexe=$request->Psexe;
            $patient->Pbirthday=$request->Pbirthday;
            $patient->save();
            $appointment->patient_id=$patient->id;
            $appointment->patient()->associate($patient);
            $appointment->establishment_id=$etbalisment->id;
            $appointment->establishment()->associate($etbalisment);
        }


        $appointment->doctor_id = $doctor->id;
        $appointment->doctor()->associate($doctor);
//dd($appointment);
        $appointment->save();
        return json_encode(array(
            "statusCode" => 200
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $this->authorize('isAdminOrAuthor');
        $p = $appointment->patient()->first();
//        dd($p);
        $date =  strtotime($appointment->start);
        $Time22 = date("Y-m-d", strtotime('+0 minutes', $date));

        return view('admin.appointment.show')->with('patient',$appointment->patient()->first())
            ->with('appointment',$appointment)
            ->with('time',$Time22);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->authorize('isAdminOrAuthor');
        $plus  =  $request->start."T". $request->time2;
        $date =  strtotime($plus);
        $Time11 = date("Y-m-d H:i:s", strtotime('+0 minutes', $date));
        $end =  strtotime('+30 minutes',$date);
        $Time22 = date("Y-m-d H:i:s", strtotime('+0 minutes', $end));

        if ($plus!="T"){
            $appointment->start=$Time11;
            $appointment->end=$Time22;
            $appointment->statu=$request->statu;

            $appointment->save();

        }else{
            $appointment->statu=$request->statu;

            $appointment->save();
        }
        if ($appointment->statu == 'approved'  or $appointment->statu == 'changed'){
          $doctor =  Doctor::findOrFail($appointment->doctor_id);
          $etbalisment = Establishment::findOrFail($doctor->establishment_id);
          $patient = Patient::findOrFail($appointment->patient_id);
          $patient->establishment()->attach($etbalisment->id);
        }

        return redirect('/appointment?id='.$appointment->doctor_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
      $appointment->patient()->dissociate();
        $appointment->doctor()->dissociate();
        $appointment->delete();
        return redirect('myappointment');
    }

    public function myappointment(){
            $patient = Patient::findOrFail(Auth::user()->usertable_id);

        return view('patient.appointment.myappointment')->with('appointments',$patient->appointments()->get());
    }
}
