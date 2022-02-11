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

    public function edit($surveyId)
    {

        $survey = Surveys::where('slug', $surveyId)->first();

        return view('recon.surveys.edit',[
            'surveyId' => $surveyId,
            'survey' => $survey
        ]);
    }



}
