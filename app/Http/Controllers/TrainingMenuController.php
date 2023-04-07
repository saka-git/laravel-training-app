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
        $request->validate([
            'name' => 'required',
            'training_category_id' => 'required',
        ]);
    
        $training_menu = new TrainingMenu();
        $training_menu->name = $request->input('name');
        $training_menu->training_category_id = $request->input('training_category_id');
        $training_menu->save();

        return redirect()->route('training_results.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingMenu  $training_menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingMenu $training_menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingMenu  $training_menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingMenu $training_menu)
    {
        //
    }
}