<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingMenu;
use App\Models\TrainingResult;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        $training_menus = TrainingMenu::all();
        $training_results = DB::select('select * from training_results where date = (select max(date) from training_results)');
        $distinct_training_menus = DB::select('select distinct training_menu_id, name from training_results, training_menus where training_results.training_menu_id=training_menus.id and training_results.date = (select max(date) from training_results)');
        $latest_training_result = TrainingResult::latest('date')->first();
        $training_dates = DB::select('select distinct date from training_results');

        return view('web.index', compact('training_menus', 'training_results','distinct_training_menus','latest_training_result', 'training_dates'));
    }

}