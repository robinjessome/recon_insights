<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surveys;

class ReconSurveysController extends Controller
{
    
    public function index()
    {

        return view('recon.surveys.index',[
            // 'surveys' => Surveys::all()
        ]);
    }



    public function showSurvey($surveyId)
    {

        $survey = Surveys::where('slug', $surveyId)->first();
        if(!$survey) {
            // return redirect()->route('surveys');
            abort(404);
        }

        return view('recon.surveys.edit',[
            'surveyId' => $surveyId,
            'survey' => $survey
        ]);
    }


    public function updateSurvey(Request $request)
    {

        return back()->with('message', 'Received!!');
    }




}
