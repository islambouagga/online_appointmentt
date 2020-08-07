<?php

namespace App\Http\Livewire;

use App\Doctor;
use App\Establishment;
use App\Specialty;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBar extends Component
{


    public $search ;
    public $location;
    public $special;



    public function doctors(){

        $query = Doctor::query();

            $query->when($this->special != null, function ($q) {
//                dd($this->special,Doctor::where('specialty_id',$this->special)->get());
                return $q->where('specialty_id','like','%'.$this->special.'%');
            });

            $query->when($this->special != null && $this->location != null, function ($q) {
//                dd($this->special,Doctor::where('specialty_id',$this->special)->get());
                return $q->where( [
                    ['specialty_id','like','%'.$this->special.'%'],
                    ['Padresse','like','%'.$this->location.'%'],
                ]);
            });


            $query->when($this->location != null && $this->search == null && $this->special == null, function ($q) {

                return $q->where('Padresse','like','%'.$this->location.'%');
            });
            $query->when($this->location != null && $this->search != null, function ($q) {

                return $q->where(    [
                    ['Dfname','like','%'.$this->search.'%'],
                    ['Padresse','like','%'.$this->location.'%'],
                ]);
            });
            $query->when($this->location == null , function ($q) {

                return $q->where('Dfname','like','%'.$this->search .'%');
            });
        $doctors = $query->get();

        return $doctors;
    }
    public function render()
    {

        $establishments=Establishment::where('Ename','like','%'.$this->search.'%')->get();
        $doctors=Doctor::where('Dfname','like','%'.$this->search.'%')->get();
        $specialties=Specialty::where('namespec','like','%'.$this->search.'%')->get();
        $specialties2=Specialty::all();
        $loczl = Doctor::all()->pluck('Padresse');
        $local = [];
        $co=0;
        while ( $co< count($loczl)){

            if (!in_array($loczl[$co],$local)){
                $local[]=$loczl[$co];
            }

                $co++;
        }
//        echo $this->location;
//        dd($local);
//        dd($this->search,$this->location,$this->special);
        return view('livewire.search-bar')
            ->with('establishments',$establishments)
            ->with('doctors',$this->doctors())
            ->with('specialties',$specialties)
            ->with('specialties2',$specialties2)
            ->with('local',$local)
            ;
    }
}
