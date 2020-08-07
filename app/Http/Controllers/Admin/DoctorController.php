<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use App\Doctor;
use App\Establishment;
use App\Http\Controllers\Controller;
use App\Specialty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->authorize('isAdmin');
        $dcotors = Doctor::all();

        if (Auth::user()->usertable_type == 'Admin') {
            return view('admin.doctor.index')->with('dcotors', $dcotors);
        } elseif (Auth::user()->usertable_type == 'Patient') {
            return view('patient.doctor.index')->with('dcotors', $dcotors);
        }elseif (Auth::user()->usertable_type == 'Doctor') {
            return view('patient.doctor.index')->with('dcotors', $dcotors);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $establishments = Establishment::all();
        $specialties = Specialty::all();
        return view('admin.doctor.create')->with('establishments', $establishments)->with('specialties', $specialties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Doctor $doctor, Establishment $establishment)
    {
        $this->authorize('isAdminOrAuthor');
//        dd($request->all());
        $this->validateRequest($request);
        $doctor->Dfname = $request->Dfname;
        $doctor->Dtel = $request->Dtel;
        $doctor->Dexpertize = $request->Dexpertize;
        $doctor->Ddiploma = $request->Ddiploma;
        $doctor->price = $request->price;

        $doctor->MWTStart = $request->MWTStart;
        $doctor->MWTStart = $request->MWTStart;
        $doctor->MWTEnd = $request->MWTEnd;
        $doctor->EWTStart = $request->EWTStart;
        $doctor->EWTEnd = $request->EWTEnd;
        if ($request->radio1 == 'non') {
            $this->validate($request, [
                'Ename' => 'required', 'string', 'max:255',
                'Etel' => 'required',
                'Eadresse' => 'required',
                'Eemail' => 'required', 'string', 'email', 'max:255',
                'Etype' => 'required|in:Doctor office,Clinic,Hospital'
            ]);
            $establishment = Establishment::create($request->all());
            $doctor->Padresse=$establishment->Eadresse;
            $doctor->establishment_id = $establishment->id;
            $doctor->establishment()->associate($establishment);
        } else {
            $establishment = Establishment::findOrFail($request->establishment);
            $doctor->Padresse=$establishment->Eadresse;
            $doctor->establishment_id = $establishment->id;
            $doctor->establishment()->associate($establishment);
        }

        if ($request->radioS1 == 'non') {
            $this->validate($request, [
                'namespec' => 'required', 'string', 'max:255',
            ]);
            $specialty = Specialty::create($request->all());
            $doctor->specialty()->associate($specialty);
            $establishment->specialties()->save($specialty);
        } else {

                $specialty = Specialty::find($request->specialty);

            $doctor->specialty()->associate($specialty);
            $establishment->specialties()->save($specialty);
        }
        $doctor->save();

        for ($i=0 ; $i<(count($request->days)) ; $i++){
            $day=new  Day();
            $day->day=$request->days[$i];

            $day->doctor_id=$doctor->id;
            $day->save();

            $day->doctor()->associate($doctor);

        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usertable_type' => $request['usertable_type'],
            'usertable_id' => $doctor->id,
        ]);
        return redirect('/admin/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $this->authorize('isAdminOrAuthor');
        $establishments = Establishment::all();
        $specialties = Specialty::all();
        return view('admin.doctor.show')->with('doctor', $doctor)->with('establishments', $establishments)->with('specialties', $specialties);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor, Establishment $establishment)
    {
        $this->authorize('isAdminOrAuthor');
//        dd($request->all());
        $user = User::where('usertable_type', 'Doctor')->first();
//        dd($user->get());

        $doctor->Dfname = $request->Dfname;
        $doctor->Dtel = $request->Dtel;
        $doctor->Dexpertize = $request->Dexpertize;
        $doctor->Ddiploma = $request->Ddiploma;
        if ($request->radio1 == 'non') {
            $this->validate($request, [
                'Ename' => 'required', 'string', 'max:255',
                'Etel' => 'required',
                'Eadresse' => 'required',
                'Eemail' => 'required', 'string', 'email', 'max:255',
                'Etype' => 'required|in:Doctor office,Clinic,Hospital'
            ]);

            $establishment = Establishment::create($request->all());
            $doctor->Padresse=$establishment->Eadresse;
            $doctor->establishment_id = $establishment->id;
            $doctor->establishment()->associate($establishment);
        } else {
            $establishment = Establishment::findOrFail($request->establishment);
            $doctor->Padresse=$establishment->Eadresse;
            $doctor->establishment_id = $establishment->id;
            $doctor->establishment()->associate($establishment);
        }
        $doctor->save();
        if ($request->radioS1 == 'non') {
            $this->validate($request, [
                'namespec' => 'required', 'string', 'max:255',
            ]);
            $specialty = Specialty::create($request->all());
            $doctor->specialties()->save($specialty);
            $establishment->specialties()->save($specialty);
        } else {
            foreach ($request->specialty as $s) {
                $sp = Specialty::find($s);
                $choices[] = $sp;
            }
            $doctor->specialties()->saveMany($choices);
            $establishment->specialties()->saveMany($choices);
        }
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,' . $user->id,

        ]);


        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'usertable_type' => $request['usertable_type'],
            'usertable_id' => $doctor->id,

        ]);

        return redirect('/admin/doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $this->authorize('isAdmin');
        //
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
    function action(Request $request)
    {
        $this->authorize('isAdminOrAuthor');
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('doctors')
                    ->where('Dfname', 'like', '%'.$query.'%')
                    ->get();

            }
            else
            {
                $data = DB::table('doctors')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->Dfname.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
