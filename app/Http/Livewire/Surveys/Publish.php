<?php

namespace App\Http\Livewire\Surveys;

use Livewire\Component;
use App\Models\Surveys;


class Publish extends Component
{
    public $surveyId;
    public $surveyStatus;

    public function render()
    {
        return view('livewire.surveys.publish');
    }


      /* PUBLISHING functions - archive, unarchive, publish, unpublish */
      public function publish()
      {
          $this->published = Surveys::where('slug', $this->surveyId)
              ->update([
                  'status' => 'published',
                  'publishDate' => now()->toDateTimeString()
              ]);
  
              if ($this->published) {
                  session()->flash('message', __('Survey published successfully'));
                  session()->flash('message-type', 'success');
              } else {
                  session()->flash('message', __('<strong>Oops</strong> We were unable to publish.'));
                  session()->flash('message-type', 'error');
              }
              return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
      }
  
      public function unpublish()
      {
          $this->published = Surveys::where('slug', $this->surveyId)
              ->update([
                  'status' => 'draft',
                  'publishDate' => null
              ]);
  
              if ($this->published) {
                  session()->flash('message', __('Survey has been unpublished.'));
                  session()->flash('message-type', 'warning');
              } else {
                  session()->flash('message', __('<strong>Oops</strong> We were unable to unpublish this.'));
                  session()->flash('message-type', 'error');
              }
              return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
      }
  
      public function archive()
      {
          $this->published = Surveys::where('slug', $this->surveyId)
              ->update([
                  'status' => 'archived',
                  'publishDate' => null
              ]);
  
              if ($this->published) {
                  session()->flash('message', __('Survey has been archived.'));
                  session()->flash('message-type', 'warning');
              } else {
                  session()->flash('message', __('<strong>Oops</strong> We were unable to archive this.'));
                  session()->flash('message-type', 'error');
              }
              return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
      }
  
      public function unarchive()
      {
          $this->published = Surveys::where('slug', $this->surveyId)
              ->update([
                  'status' => 'draft',
              ]);
  
              if ($this->published) {
                  session()->flash('message', __('Survey has been unarchived.'));
                  session()->flash('message-type', 'warning');
              } else {
                  session()->flash('message', __('<strong>Oops</strong> We were unable to unarchive this.'));
                  session()->flash('message-type', 'error');
              }
              return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
      }
  

      
      
}
