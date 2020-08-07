<?php

namespace App\Http\Livewire;

use App\Doctor;
use Livewire\Component;

class SearchBar2 extends Component
{

    public $query;
    public $doctors;
    public $highlightIndex;

    public function mount()
    {
        $this->query = '';
        $this->doctors = [];
        $this->highlightIndex = 0;
    }

//    public function reset()
//    {
//        $this->query = '';
//        $this->doctors = [];
//        $this->highlightIndex = 0;
//    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->doctors) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->doctors) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectDoctor()
    {
        $contact = $this->doctors[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }

    public function updatedQuery()
    {
        $this->doctors = Doctor::where('Dfname', 'like', '%' . $this->query . '%')
            ->get()
            ->toArray();
    }

    public function render()
    {

        $this->doctors =Doctor::where('Padresse','like','%'.$this->query.'%')->get();
;
        return view('livewire.search-bar2')->with('doctors',$this->doctors);
    }
}
