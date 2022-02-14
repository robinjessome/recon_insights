<?php

namespace App\Http\Livewire\Surveys;

use Illuminate\Support\Str;
use Livewire\Component;

class Slug extends Component
{

    // public $surveyId;
    // public $currentSlug;
    public $slug;
    public $wireSlugChanged = false;
    public $showDropdown = false;


    public function mount($slug) {

        $this->originalSlug = $slug;
    }

    public function render()
    {
        return view('livewire.surveys.slug');
    }


    // public function updated($propertyName)
    // {
    //     $this->slug = Str::slug($this->slug);

    //     // session()->flash('message', __('Checking slug'));

    //     if ($this->slug !== $this->currentSlug ) {
    //         $this->validateOnly($propertyName, [
    //             'slug' => 'required|string|max:120|unique:surveys',
    //         ]);
    //     } else {
    //         $this->wireSlugChanged = false;
    //         // $this->resetValidation('slug');
    //     }

    // }


    // public function archive()
    // {
    //     $this->wireSlugChanged = false;
    // }
 
    // public function delete()
    // {
    //     $this->wireSlugChanged = false;
    // }


        // $this->validateOnly($propertyName, [
        //     'slug' => 'required|string|max:255|unique:surveys',
        // ]);
    // }

    public function validateSlug() 
    {
        $this->slug = Str::slug($this->slug);
    
        if ($this->slug !== $this->originalSlug ) {
            $this->validateOnly('slug', [
                'slug' => 'required|string|max:120|unique:surveys',
            ]);
            $this->wireSlugChanged = true;

         } else {
            $this->resetValidation('slug');
            $this->wireSlugChanged = false;
         }
    }

}
