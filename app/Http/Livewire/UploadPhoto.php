<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{

    use WithFileUploads;
 
    public $surveyId;
    public $featuredImage;


    public function render()
    {
        return view('livewire.upload-photo');
    }


    // public function save()
    // {
    //     $this->validate([
    //         'photo' => 'image|max:102400', // 1MB Max
    //     ]);
 
    //     $path = $this->photo->store('photos');

    //     session()->flash('message', __('Uploaded '.$path.' successfully'));
    //     return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);

    // }
}
