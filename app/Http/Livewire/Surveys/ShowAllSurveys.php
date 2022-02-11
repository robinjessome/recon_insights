<?php

namespace App\Http\Livewire\Surveys;

use Livewire\Component;

use App\Models\Surveys;

class ShowAllSurveys extends Component
{


    public $showArchived;

    public function render()
    {

        return view('livewire.surveys.show-all-surveys', [
            'surveys' =>  Surveys::latest()
                // ->whereNotIn('status', ['archived'])
                ->paginate(5)
                // ->get()
        ]);
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
