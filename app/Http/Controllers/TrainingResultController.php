<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use App\Models\TrainingMenu;
use App\Models\TrainingResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TrainingResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_categories = TrainingCategory::all();

        return view('training.index', compact('training_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainingResult = new TrainingResult();
        $trainingResult->user_id = Auth::user()->id;
        $trainingResult->training_menu_id = $request->input('training_menu_id');
        $trainingResult->weight = $request->input('weight');
        $trainingResult->rep = $request->input('rep');
        $trainingResult->date = $request->input('date');
        $trainingResult->save();

        return redirect()->route('training.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingResult  $trainingResult
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingResult $trainingResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\trainingResult  $trainingResult
     * @return \Illuminate\Http\Response
     */
    public function edit(trainingResult $trainingResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\trainingResult  $trainingResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trainingResult $trainingResult)
    {
        $trainingResult->user_id = Auth::user()->id;
        $trainingResult->training_menu_id = $request->input('training_menu_id');
        $trainingResult->weight = $request->input('weight');
        $trainingResult->rep = $request->input('rep');
        $trainingResult->date = $request->input('date');
        $trainingResult->update();
        
        return redirect()->route('training.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trainingResult  $trainingResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(trainingResult $trainingResult)
    {
        $trainingResult->delete();
        
        return redirect()->route('training.index');
    }
}