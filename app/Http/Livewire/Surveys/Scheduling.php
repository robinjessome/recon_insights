<?php

namespace App\Http\Livewire\Surveys;

use Livewire\Component;
use App\Models\Surveys;
use Carbon\Carbon;

class Scheduling extends Component
{
    public $surveyId;
    public $wireStartDate;
    public $formattedDateTime;
    public $formattedDate;
    public $formattedTime;

    public function render()
    {
        if($this->wireStartDate) {  
            $this->formattedDate = Carbon::createFromDate($this->wireStartDate)->format('M d, Y');
            $this->formattedTime = Carbon::createFromDate($this->wireStartDate)->format('g:ia');
        }
        return view('livewire.surveys.scheduling');
    }

    public function schedule()
    {

        $now = now();
        // $this->status = 'updating';

        if ($this->wireStartDate > $now) {
            // session()->flash('message', 'future...');

            
            $this->scheduled = Surveys::where('slug', $this->surveyId)
            ->update([
                'status' => 'scheduled',
                'publishDate' => $this->wireStartDate
            ]);
            
        }
            if ($this->scheduled) {
                session()->flash('message', __('Survey '.$this->surveyId.' scheduled successfully'));
                session()->flash('message-type', 'success');
            } else {
                session()->flash('message', __('<strong>Oops</strong> We were unable to schedule.'));
                session()->flash('message-type', 'error');
            }
            return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
    }
}
