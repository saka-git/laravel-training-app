<?php

namespace App\Http\Controllers;

use App\Models\TrainingResult;
use App\Models\TrainingMenu;
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
        return view('training.index');
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
        $trainigResult = new TrainingResult();
        $trainigResult->user_id = Auth::user()->id;
        $trainigResult->training_menu_id = $request->input('training_menu_id');
        $trainigResult->weight = $request->input('weight');
        $trainigResult->rep = $request->input('rep');
        $trainigResult->date = $request->input('date');
        $trainigResult->save();

        return redirect()->route('training.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainigResult  $trainigResult
     * @return \Illuminate\Http\Response
     */
    public function show(TrainigResult $trainigResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainigResult  $trainigResult
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainigResult $trainigResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainigResult  $trainigResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainigResult $trainigResult)
    {
        $trainigResult->user_id = Auth::user()->id;
        $trainigResult->training_menu_id = $request->input('training_menu_id');
        $trainigResult->weight = $request->input('weight');
        $trainigResult->rep = $request->input('rep');
        $trainigResult->date = $request->input('date');
        $trainigResult->update();
        
        return redirect()->route('training.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainigResult  $trainigResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainigResult $trainigResult)
    {
        $trainigResult->delete();
        
        return redirect()->route('training.index');
    }
}