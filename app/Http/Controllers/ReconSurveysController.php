<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ValidatedInput;
use Illuminate\Support\Facades\Storage;
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


    public function updateSurvey(Request $request, $surveyId = null)
    {

        if (!$surveyId) {
            return back()->with('message', 'Oops!');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:120',
            'description' => 'max:255',
            // 'featuredImage' => 'nullable|image', //image|max:102400
        ]);

        Storage::disk('s3')->put('avatars/1', $request['featuredImage']);

        // $path = $request['featuredImage']->store('photos');

        $updated = Surveys::where('slug', $surveyId)
        ->update([
            'slug' => $validated['slug'],
            'title' => $validated['title'],
            'description' => $validated['description'],

            // 'status' => 'published',
            // 'publishDate' => now()->toDateTimeString()
        ]);

        session()->flash('message', __('Survey '.$validated['slug'].' updated!'));
        session()->flash('message-type', 'success');

        return redirect()->route('edit-survey', ['surveyId' => $validated['slug']]);

    }


    public function getInsights($surveyId)
    {

        $survey = Surveys::where('slug', $surveyId)->first();
        if(!$survey) {
            // return redirect()->route('surveys');
            abort(404);
        }

        return view('recon.surveys.insights',[
            'surveyId' => $surveyId,
            'survey' => $survey
        ]);
    
    
    }

    public function show($surveyId)
    {

        $survey = Surveys::where('slug', $surveyId)->first();
        if(!$survey) {
            // return redirect()->route('surveys');
            abort(404);
        }

        return view('public.survey',[
            'surveyId' => $surveyId,
            'survey' => $survey
        ]);
    
    
    }




}
