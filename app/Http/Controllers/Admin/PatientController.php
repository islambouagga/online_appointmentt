<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Auth::user()->usertable_type);
        $this->authorize('isAdminOrAuthor');
        $patients=Patient::all();
//
//        dd($doctor->patients);
        if (Auth::check()){
//            dd('od');
            if (Auth::user()->usertable_type == 'Admin') {
//                dd('in if');
                return view('admin.patient.index')->with('patients',$patients);
            }
            elseif (Auth::user()->usertable_type == 'Doctor') {
                $doctor  = Doctor::findOrFail(Auth::user()->usertable_id);
//                dd('in else');
                return view('admin.patient.index')->with('patients',$doctor->patients);
            }
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $this->authorize('isAdminOrAuthor');
        return view('admin.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Patient $patient)
    {
        $this->authorize('isAdminOrAuthor');
//        dd($request->all());
        $this->validateRequest($request);
        $patient->Pfname=$request->Pfname;
        $patient->Ptel= $request->Ptel;
        $patient->Psexe=$request->Psexe;
        $patient->Pbirthday=$request->Pbirthday;
        $patient->save();
        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usertable_type'=> $request['usertable_type'],
            'usertable_id'=> $patient->id,
            'approved' =>  $request['approved'],

        ]);
        return redirect('/patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $this->authorize('isAdminOrAuthor');
        return view('admin.patient.show')->with('patient',$patient);
    }

    /**>
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $this->authorize('isAdminOrAuthor');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $this->authorize('isAdminOrAuthor');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $this->authorize('isAdminOrAuthor');
        foreach ($patient->establishment as $item){
            $item->patients()->detach($patient->id);
        }
        foreach ($patient->doctors as $doctor){
            $doctor->patients()->detach($patient->id);
        }
        foreach ($patient->appointments() as $item) {
            $item->patient()->dissociate();
            $item->doctor()->dissociate();
            $item->delete();
        }
        $patient->delete();
        return  redirect('/patient');
    }

    public function validateRequest($request)
    {
        $rules = [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:6'
        ];
        $this->validate($request, $rules);
    }
}
