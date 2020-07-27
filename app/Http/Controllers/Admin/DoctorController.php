<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Establishment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
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
        $dcotors=Doctor::all();
        return view('admin.doctor.index')->with('dcotors',$dcotors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $establishments=Establishment::all();
        return view('admin.doctor.create')->with('establishments',$establishments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Doctor $doctor,Establishment $establishment)
    {
//        dd($request->all());
        $this->validateRequest($request);
        $doctor->Dfname=$request->Dfname;
        $doctor->Dtel=$request->Dtel;
        $doctor->Dexpertize= $request->Dexpertize;
        $doctor->Ddiploma=$request->Ddiploma;
        if ($request->radio1 == 'non'){
            $this->validate($request,[
                'Ename' => 'required','string', 'max:255',
                'Etel' => 'required',
                'Eadresse' => 'required',
                'Eemail' => 'required', 'string', 'email', 'max:255',
                'Etype' => 'required|in:Doctor office,Clinic,Hospital'
            ]);

            $establishment=Establishment::create($request->all());
            $doctor->establishment_id=$establishment->id;
            $doctor->establishment()->associate($establishment);
        }else{
            $establishment = Establishment::findOrFail($request->establishment);
            $doctor->establishment_id=$establishment->id;
            $doctor->establishment()->associate($establishment);
        }
//        dd($doctor);
        $doctor->save();
        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usertable_type'=> $request['usertable_type'],
            'usertable_id'=> $doctor->id,

        ]);


        return redirect('/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function validateRequest($request)
    {
        $rules = [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ];
        $this->validate($request, $rules);
    }
}
