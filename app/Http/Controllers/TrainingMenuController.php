<?php

namespace App\Http\Controllers;

use App\Models\TrainingMenu;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;

class TrainingMenuController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trainingMenu = new TrainingMenu();
        $trainingMenu->name = $request->input('name');
        $trainingMenu->training_category_id	= $request->input('training_category_id');
        $trainingMenu->save();

        return redirect()->route('training.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingMenu  $trainingMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingMenu $trainingMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingMenu  $trainingMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingMenu $trainingMenu)
    {
        //
    }
}