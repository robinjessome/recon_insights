<?php

namespace App\Http\Livewire\Surveys;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Surveys;

use Livewire\Component;

class Create extends Component
{

    public $surveyId;
    public $title;
    public $slug;
    public $content;
    public $published;
    // public $author;
    // public $authorName;
    // public $description = '';

    protected $listeners = ['editorjs-save:myEditor' => 'saveEditorState']; 

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:surveys',
    ];



    // sluggify the slug field on change
    public function makeSlug() {
        $this->slug = Str::slug($this->slug);
    }

    public function setSlugByTitle() {
        if(!$this->slug) {
            $this->slug = Str::slug($this->title);
        }
    }

    // reset when cancelled
    public function resetForm() {
        $this->reset('title');
        $this->reset('slug');
    }

    public function create()
    {
        $this->validate();

        $create = Surveys::create([
            'surveyId' => $this->surveyId,
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => Auth::user()->id,
            // 'content' => $this->content,
        ]);

        if ($create) {
            session()->flash('message', __('Survey created successfully'));
            session()->flash('message-type', 'success'); 
            return redirect()->route('edit-survey', ['surveyId'=> $this->slug]);
        } else {
            session()->flash('message', 'ERRORRRRR');        
            session()->flash('message-type', 'error');   
        }
        return redirect()->route('surveys');
    }


    // public function saveEditorState($editorJsonData)
    // {
    //     $this->content = $editorJsonData;
    // }



    public function mount()
    {
        $this->surveyId = uniqid();
        $this->author = Auth::user()->id;
        $this->authorName = Auth::user()->name;
    }



    public function render()
    {
        return view('livewire.surveys.create');
    }
}
