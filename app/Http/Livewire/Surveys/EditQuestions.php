<?php

namespace App\Http\Livewire\Surveys;

use Livewire\Component;

class EditQuestions extends Component
{

    // public $questionSource = [
    //     ['id' => 1, 'title' => 'First Question'],
    //     ['id' => 2, 'title' => 'Second Question'],
    //     ['id' => 3, 'title' => 'Third Question'],
    //     ['id' => 4, 'title' => 'Fourth Question'],
    //     ['id' => 5, 'title' => 'Fifth Question'],
    // ];

    public $questionSource;
    public $questions;

    public function render()
    {
        if(!$this->questionSource) {
            $this->questionSource = array();
        }
        $this->questions = json_encode($this->questionSource);

        return view('livewire.surveys.edit-questions');
    }

    public function addQuestion() {

        $this->dispatchBrowserEvent('setchanged', ['true']);
        $question = [
            'id' => uniqid()
        ];     
        array_push($this->questionSource, $question);
    }

    public function removeQuestion() {
  
        // $collection = collect($this->questionSource);
        // $filtered = $collection->whereNotIn('id', $theQuestion);
    }


    public function updateQuestionOrder($orderedIds)
    {

        $this->dispatchBrowserEvent('setchanged', ['true']);
        $this->questions = json_encode($this->questionSource);
        $this->questionSource = collect($orderedIds)->map(function ($id) {

            // dd($id['value']);

            return collect($this->questionSource)->where('id', $id['value'])->first();


        })->toArray();

        // dd($orderedIds);

    }
}
