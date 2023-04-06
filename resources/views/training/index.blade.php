@extends('layouts.app')

@push('styles')
{{-- TODO: cdn最新だとimportが記述してあり、エラー --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js"></script>
@endpush

@section('content')
<!-- データ渡す用スクリプト -->
<script>
  //タブ
  const trainingMenus = @json($training_menus);
  //カレンダー
  const trainingDates = @json($training_dates);
  //カレンダー→トレーニングリザルト
  const trainingResults = @json($training_results);
  const distinctTrainingAllMenus = @json($distinct_training_all_menus);

  //グラフ
  const trainingMaxResults = @json($twoweeks_max_results);
  const trainingTotalResults = @json($twoweeks_total_results);
  const dateRange = @json($date_range);
  const trainingMaxMenuResults = @json($twoweeks_max_menu_results);
  const trainingTotalMenuResults = @json($twoweeks_total_menu_results);
  const trainingMaxCategoryResults = @json($twoweeks_max_category_results);
  const trainingTotalCategoryResults = @json($twoweeks_total_category_results);

</script>
<!-- トレーニング追加用モーダル -->
@include('modals.add_training_result')
<!-- トレーニングメニュー追加用モーダル -->
@include('modals.add_training_menu')

@foreach ($training_results as $training_result)
<!-- トレーニングリザルトの編集用モーダル -->
@include('modals.edit_training_result') 
<!-- トレーニングリザルトの削除用モーダル -->
@include('modals.delete_training_result')
@endforeach

<!-- タブ -->
<div>
  <input type="radio" class="btn-check" name="training-categories" id="option-all" autocomplete="off" checked onClick="allBtnAction()">
    <label class="btn btn-outline-primary mt-1" for="option-all">All</label>
  @foreach ($training_categories as $training_category)
  <input type="radio" class="btn-check" name="training-categories" id="option-{{ $training_category->id }}" value="{{ $training_category->id }}" autocomplete="off" onClick="trainingCategoryBtnAction()">
    <label class="btn btn-outline-primary mt-1" for="option-{{ $training_category->id }}">{{ $training_category->name }}</label>
  @endforeach
  <!-- トレーニングメニューをjavascriptで追加 -->
  <div id="btn-training-menu"></div>
</div>
<!-- カレンダーグラフ切り替えボタン -->
<div>
  <input type="radio" class="btn-check" name="changes" id="option-calendar" autocomplete="off" checked onClick="calendarBtnAction()">
    <label class="btn btn-outline-primary mt-1" for="option-calendar">カレンダー</label>
  <input type="radio" class="btn-check" name="changes" id="option-graph" autocomplete="off" onClick="chartBtnAction()">
    <label class="btn btn-outline-primary mt-1" for="option-graph">グラフ</label>
</div>
<div class="row">
  <!-- カレンダー -->
  <div id="myCalendar" class="wrapper col-6">
    <h1 id="header"></h1>
    <div id="next-prev-button">
      <button id="prev" onclick="prev()">‹</button>
      <button id="next" onclick="next()">›</button>
    </div>
    <div id="calendar"></div>
  </div>

  <!-- トレーニング結果（カード）javascriptで追加 -->
  <div id="training-card" class="row col-6">
  </div>
</div>

<!-- グラフ -->
<div id="myChart" style="max-width:900px;max-height:450px;">
  <canvas id="myChart1"></canvas>
</div>

@endsection