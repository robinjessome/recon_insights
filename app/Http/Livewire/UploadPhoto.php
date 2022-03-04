<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UploadPhoto extends Component
{

    use WithFileUploads;
 
    public $surveyId;
    public $currentImage;
    public $currentImagePath;
    public $featuredImage;
    public $iteration = 0;


    public function render()
    {
        return view('livewire.upload-photo');
    }


    public function mount() {
        
        if($this->currentImagePath) {
            $this->currentImage = Storage::disk('s3')->url($this->currentImagePath);
        }

    }

    public function removeImage() {

        $this->featuredImage = '';
        $this->currentImage = null;  
        $this->currentImagePath = 'remove';
        $this->iteration++;

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
