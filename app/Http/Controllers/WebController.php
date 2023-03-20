<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingMenu;

class WebController extends Controller
{
    public function index()
    {
        $training_menus = TrainingMenu::all();

        return view('web.index', compact('training_menus'));
    }

}