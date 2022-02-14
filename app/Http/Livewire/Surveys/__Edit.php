<?php

namespace App\Http\Livewire\Surveys;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Surveys;


class Editxx extends Component
{

    public $survey;
    public $slug;
    public $slugChanged;
    public $title;
    public $description;

    public $status;

    // public $publishDate;
    // protected $startDate;
    // public $prettyDate;

    protected $testVar ='test var!';

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:surveys',
        'description' => 'max:255',
        // 'publishDate' => 'date',
    ];


    // protected $validationAttributes = [
    //     'editSlug' => 'slug'
    // ];

    public function mount() 
    {
        $this->slug = $this->survey->slug;
        $this->status = $this->survey->status;
        $this->title = $this->survey->title;
        $this->description = $this->survey->description;

        // if($this->survey->startDate) {
        //     $this->startDate = $this->survey->startDate->format('Y-m-d\TH:i');
        //     $this->prettyDate = $this->survey->startDate->format('M d, Y g:ia');
        // } else {
        //     $this->prettyDate = 'No date set';
        // }

        // $this->prettyDate = Carbon::createFromDate($this->publishDate)->format('M d, Y g:ia');
    }

    public function render()
    {
        return view('livewire.surveys.edit', [
            'test' => $this->testVar
        ]);
    }


    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }


    public function validateSlug() 
    {
        $this->slug = Str::slug($this->slug);
    
        if ($this->slug !== $this->survey->slug ) {
            $this->validateOnly('slug');
         } else {
            $this->resetValidation('slug');
            $this->slugChanged = false;
         }
    }



    public function update()
    {
        // $this->validate();
        if ($this->slug === $this->survey->slug ) {
            $validatedData = $this->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'max:255',
                // 'publishDate' => 'date',
            ]);
            
            // $this->updated = Surveys::where('slug', $this->survey->slug)
            // ->update([
            //     'title' => $this->title,
            // ]);
            
        } else {
            $this->validate();

            // $this->updated = Surveys::where('slug', $this->survey->slug)
            // ->update([
            //     'slug' => $this->slug,
            //     'title' => $this->title,
            // ]);
        }

        if (!$this->publishDate) {
            $this->publishDate = null;
        }

        $this->updated = Surveys::where('slug', $this->survey->slug)
        ->update([
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'publishDate' => $this->publishDate,
        ]);

            
        // ]);

        if ($this->updated) {
            session()->flash('message', 'Survey <strong>'.$this->title.'</strong> updated successfully');
            session()->flash('message-type', 'success'); 
            // return redirect()->route('edit-survey', ['surveyId'=> $this->slug]);
        } else {
            session()->flash('message', 'ERRORRRRR');        
            session()->flash('message-type', 'error');   
        }

        return redirect()->route('edit-survey', ['surveyId'=> $this->slug]);
    }



        /* PUBLISHING functions - archive, unarchive, publish, unpublish */

        public function publish()
        {

            session()->flash('message', 'publishing...');
            // $now = now();
            // $this->status = 'updating';

            // if (!$this->startDate > $now) {
            //     // session()->flash('message', 'future...');

            // }

            // $this->published = Surveys::where('slug', $this->surveyId)
            //     ->update([
            //         'status' => 'published',
            //         'publishDate' => now()->toDateTimeString()
            //     ]);
    
                // if ($this->published) {
                //     session()->flash('message', __('Survey published successfully'));
                //     session()->flash('message-type', 'success');
                // } else {
                //     session()->flash('message', __('<strong>Oops</strong> We were unable to publish.'));
                //     session()->flash('message-type', 'error');
                // }
                // return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
        }


}
