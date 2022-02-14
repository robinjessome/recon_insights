<?php

namespace App\Http\Livewire\Surveys;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Surveys;

class ShowAllSurveys extends Component
{
    
    use WithPagination;

    public $showArchived;
    public $search = '';
    public $sortField = 'publishDate';
    public $sortDirection = 'desc';

    protected $queryString;

    public function render()
    {
        return view('livewire.surveys.show-all-surveys', [
            'surveys' =>  Surveys::
                search('title', $this->search)
                ->orderBy($this->sortField, $this->sortDirection)
                ->showArchived($this->showArchived)
                // ->latest()
                ->paginate(50)
                //   ->get()
        ]);
    }


    public function sortBy($field)
    {

        $this->queryString = ['sortField', 'sortDirection'];

        if($this->sortField == $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;

    }

    // public function showAll()
    // {

    //     // if($this->showArchived) {
    //     //     $allSurveys = Surveys::latest()->get();
    //     //     return $this->surveys = $allSurveys;
    //     // } else {
    //     //     $surveys = Surveys::latest()
    //     //                 ->whereNotIn('status', ['archived'])
    //     //                 ->paginate(2);
    //     //                 // ->get();
    //     //     return $this->surveys = $surveys;

    //     // }

    // }
}
