<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingMenu;
use App\Models\TrainingResult;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * チャートデータを取得
     */
    public function chartGet() {
        // 固定データを返却。DBからデータを取得すると良い
        return DB::select('weight', 'rep');

    }
}