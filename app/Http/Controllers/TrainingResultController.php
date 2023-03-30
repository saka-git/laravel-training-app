<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use App\Models\TrainingMenu;
use App\Models\TrainingResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;


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
        $training_menus = TrainingMenu::all();
        $training_results = TrainingResult::all();

        // カレンダー用データ
        $training_dates = DB::select('select distinct date from training_results');

        // グラフ用データ
        $twoweeks_max_results = DB::select('select max(weight), date from training_results where date between date_sub(now(), interval 2 week) and now() group by date');
        $twoweeks_total_results = DB::select('select sum(weight * rep) as sum, date from training_results where date between date_sub(now(), interval 2 week) and now() group by date');
        
        // 2週間前から今日までの日付をループで処理して配列に追加
        $date_range = array(); // 空の配列を作成
        $graph_day_range = GlobalConst::GRAPH_DAY_RANGE;
        $strtotime_day = $graph_day_range - 1;
        $start_ymd = date('Y-m-d', strtotime("-{$strtotime_day} day"));
        for($i=0; $i<$graph_day_range; $i++) {
            $date_range[] = date('Y-m-d', strtotime("+{$i} day", strtotime($start_ymd)));
        }

        // カレンダー→トレーニングリザルトのデータ取得
        $distinct_training_all_menus = DB::select('select distinct training_menu_id, name, date from training_results, training_menus where training_results.training_menu_id=training_menus.id');



        return view('training.index', compact('training_categories', 'training_menus', 'training_results', 'training_dates','twoweeks_max_results','twoweeks_total_results', 'date_range', 'distinct_training_all_menus'));
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