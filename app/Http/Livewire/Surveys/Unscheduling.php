<?php

namespace App\Http\Livewire\Surveys;

use Livewire\Component;
use App\Models\Surveys;
use Carbon\Carbon;

class Unscheduling extends Component
{

    public $surveyId;
    public $wireEndDate;
    public $formattedDateTime;
    public $formattedDate;
    public $formattedTime;


    public function render()
    {
        if($this->wireEndDate) {  
            $this->formattedDate = Carbon::createFromDate($this->wireEndDate)->format('M d, Y');
            $this->formattedTime = Carbon::createFromDate($this->wireEndDate)->format('g:ia');
        }
        return view('livewire.surveys.unscheduling');
    }


    public function schedule()
    {

        $now = now();

        if ($this->wireEndDate > $now) {
            
            $this->scheduled = Surveys::where('slug', $this->surveyId)
            ->update([
                'expireDate' => $this->wireEndDate
            ]);
            
        }
            if ($this->scheduled) {
                session()->flash('message', __('Survey unpublishing '.$this->surveyId.' scheduled successfully'));
                session()->flash('message-type', 'success');
            } else {
                session()->flash('message', __('<strong>Oops</strong> We were unable to schedule unpublishing.'));
                session()->flash('message-type', 'error');
            }
            return redirect()->route('edit-survey', ['surveyId' => $this->surveyId]);
    }
}
