<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        $survey = Surveys::where('slug', $surveyId)
            ->first();

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
            'questions' => 'nullable|json',
            'featuredImage' => 'nullable|image', //image|max:102400
            'mainContent' => 'nullable|string',
        ]);

        // dd($request->all());

        if($request['currentImagePath'] == 'remove') {
            $featuredImagePath = null;
        } else {
            $featuredImagePath = $request['currentImagePath'];
        }

        if($request['featuredImage']) {
            $featuredImagePath = Storage::disk('s3')->put('images', $request['featuredImage']);        
            // $path = $request['featuredImage']->store('photos');
        }

        $updated = Surveys::where('slug', $surveyId)
        ->update([
            'slug' => Str::slug($validated['slug']), // prepareForValidation? 
            'title' => $validated['title'],
            'description' => $validated['description'],
            'questions' => $validated['questions'],
            'featuredImage' => $featuredImagePath,
            'mainContent' => $validated['mainContent'],

            // 'status' => 'published',
            // 'publishDate' => now()->toDateTimeString()
        ]);

        session()->flash('message', __('Survey '.$validated['slug'].' updated!'));
        session()->flash('message-type', 'success');

        return redirect()->route('edit-survey', [ 'surveyId' => Str::slug($validated['slug']) ]);

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

    public function showPublic($surveyId)
    {

        $survey = Surveys::where('slug', $surveyId)
            ->where('publishDate', '<=', now())
            ->first();

        if(!$survey) {
            // return redirect()->route('surveys');
            abort(404);
        }

        return view('public.survey',[
            'surveyId' => $surveyId,
            'survey' => $survey
        ]);
    
    
    }





    
    //     /**
    //  * Prepare the data for validation.
    //  *
    //  * @return void
    //  */
    // public function prepareForValidation(Request $request)
    // {
    //     dd($request->all());
    //     // $this->merge([
    //     //     'slug' => Str::upper($this->slug),
    //     // ]);
    // }





}
