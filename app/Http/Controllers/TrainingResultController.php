<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use App\Models\TrainingMenu;
use App\Models\TrainingResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TrainingResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $training_categories = TrainingCategory::all();
        $training_menus = TrainingMenu::all();
        $training_results = TrainingResult::all();

        // カレンダー用データ
        $training_dates = DB::select("select distinct date, training_menu_id as menu_id, training_category_id as category_id from training_results, training_menus where training_results.training_menu_id=training_menus.id and user_id = $user_id");

        // グラフ用データ
        $twoweeks_max_results = DB::select("select max(weight), date from training_results where user_id = $user_id and date between date_sub(now(), interval 2 week) and now() group by date");
        $twoweeks_total_results = DB::select("select sum(weight * rep) as sum, date from training_results where user_id = $user_id and date between date_sub(now(), interval 2 week) and now() group by date");

        $twoweeks_max_menu_results = DB::select("select max(weight), date, training_menu_id as menu_id, training_category_id as category_id from training_results, training_menus where training_results.training_menu_id=training_menus.id and user_id = $user_id and date between date_sub(now(), interval 2 week) and now() group by date, training_menu_id, training_category_id");
        $twoweeks_total_menu_results = DB::select("select sum(weight * rep) as sum, date, training_menu_id as menu_id, training_category_id as category_id from training_results, training_menus where training_results.training_menu_id=training_menus.id and user_id = $user_id and date between date_sub(now(), interval 2 week) and now() group by date, training_menu_id, training_category_id");
        $twoweeks_max_category_results = DB::select("select max(weight), date, training_category_id as category_id from training_results, training_menus where training_results.training_menu_id=training_menus.id and user_id = $user_id and date between date_sub(now(), interval 2 week) and now() group by date, training_category_id");
        $twoweeks_total_category_results = DB::select("select sum(weight * rep) as sum, date, training_category_id as category_id from training_results, training_menus where training_results.training_menu_id=training_menus.id and user_id = $user_id and date between date_sub(now(), interval 2 week) and now() group by date, training_category_id");        
        // 2週間前から今日までの日付をループで処理して配列に追加
        $date_range = array(); // 空の配列を作成
        $graph_day_range = GlobalConst::GRAPH_DAY_RANGE;
        $strtotime_day = $graph_day_range - 1;
        $start_ymd = date('Y-m-d', strtotime("-{$strtotime_day} day"));
        for($i=0; $i<$graph_day_range; $i++) {
            $date_range[] = date('Y-m-d', strtotime("+{$i} day", strtotime($start_ymd)));
        }

        // カレンダー→トレーニングリザルトのデータ取得
        $distinct_training_all_menus = DB::select("select distinct training_menu_id, name, date from training_results, training_menus where training_results.training_menu_id=training_menus.id and training_results.user_id = $user_id");


        return view('training.index', compact('training_categories', 'training_menus', 'training_results', 'training_dates','twoweeks_max_results','twoweeks_total_results', 'date_range', 'distinct_training_all_menus','twoweeks_max_menu_results','twoweeks_total_menu_results','twoweeks_max_category_results','twoweeks_total_category_results'));
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
        $request->validate([
            'training_menu_id' => 'required',
            'rep' => 'required',
            'date' => 'required',
        ]);

        $date = $request->input('date');
        $training_menu_id = $request->input('training_menu_id');

        $num = count($request->input('rep'));
        
        for ($i = 0; $i < $num; $i++) {
            $training_result = new TrainingResult();
            $training_result->user_id = Auth::user()->id;
            $training_result->training_menu_id = $training_menu_id;
            $training_result->weight = $request->input('weight')[$i];
            $training_result->rep = $request->input('rep')[$i];
            $training_result->date = $date;
            $training_result->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingResult  $training_result
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingResult $training_result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingResult  $training_result
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingResult $training_result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingResult  $training_result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingResult $training_result)
    {
        
        $training_result->user_id = Auth::user()->id;
        $training_result->training_menu_id = $request->input('training_menu_id');
        $training_result->weight = $request->input('weight');
        $training_result->rep = $request->input('rep');
        $training_result->date = $request->input('date');
        $training_result->update();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingResult  $training_result
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingResult $training_result)
    {

        $training_result->delete();
        
        return redirect()->back();
    }
}