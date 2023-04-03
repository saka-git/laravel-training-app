@extends('layouts.app')

@section('content')
<!-- データ渡す用スクリプト -->
<script>
  //カレンダー
  const trainingDates = @json($training_dates);
  //カレンダー→トレーニングリザルト
  const trainingResults = @json($training_results);
  const distinctTrainingAllMenus = @json($distinct_training_all_menus);

  //グラフ
  const trainingMaxResults = @json($twoweeks_max_results);
  const trainingTotalResults = @json($twoweeks_total_results);
  const dateRange = @json($date_range);

</script>
<!-- トレーニング追加用モーダル -->
@include('modals.add_training_result')
<!-- トレーニングメニュー追加用モーダル -->
@include('modals.add_training_menu')

<!-- タブ -->
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button
      class="nav-link active"
      id="pills-all-tab"
      data-bs-toggle="pill"
      data-bs-target="#pills-all"
      type="button"
      role="tab"
      aria-controls="pills-all"
      aria-selected="true"
    >
      All
    </button>
  </li>
  @foreach ($training_categories as $training_category)
  <li class="nav-item" role="presentation">
    <button
      class="nav-link"
      id="pills-{{ $training_category->id }}-tab"
      data-bs-toggle="pill"
      data-bs-target="#pills-{{ $training_category->id }}"
      type="button"
      role="tab"
      aria-controls="pills-{{ $training_category->id }}"
      aria-selected="false"
    >
    {{ $training_category->name }}
    </button>
  </li>
  @endforeach
</ul>

<!-- タブ中身All -->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
    <!-- カレンダーグラフ切り替えボタン -->
    <input type="radio" class="btn-check" name="options" id="option-all-calendar" autocomplete="off" checked onClick="calendarBtnAction()">
      <label class="btn btn-outline-primary" for="option-all-calendar">カレンダー</label>
    <input type="radio" class="btn-check" name="options" id="option-all-graph" autocomplete="off" onClick="chartBtnAction()">
      <label class="btn btn-outline-primary" for="option-all-graph">グラフ</label>

    <!-- カレンダー -->
    <div id="myCalendar" class="wrapper">
      <h1 id="header"></h1>
      <div id="next-prev-button">
        <button id="prev" onclick="prev()">‹</button>
        <button id="next" onclick="next()">›</button>
      </div>
      <div id="calendar"></div>
    </div>

    <!-- トレーニング結果（カード）javascriptで追加 -->
    <div id="training-card">
    </div>

    <!-- グラフ -->
    <div id="myChart" style="max-width:900px;max-height:450px;">
      <canvas id="myChart1"></canvas>
    </div>

  </div>
  
  <!-- タブ中身カテゴリー -->
  @foreach ($training_categories as $training_category)
  <div class="tab-pane fade" id="pills-{{ $training_category->id }}" role="tabpanel" aria-labelledby="pills-{{ $training_category->id }}-tab">
    <input type="radio" class="btn-check" name="training-{{ $training_category->id }}" id="option-{{ $training_category->id }}-all" autocomplete="off" checked>
      <label class="btn btn-outline-primary" for="option-{{ $training_category->id }}-all">All</label>
    @foreach ($training_menus as $training_menu)
    @if ($training_menu->training_category_id === $training_category->id)  
    <input type="radio" class="btn-check" name="training-{{ $training_category->id }}" id="option-{{ $training_category->id }}-{{ $training_menu->id }}" autocomplete="off">
      <label class="btn btn-outline-primary" for="option-{{ $training_category->id }}-{{ $training_menu->id }}">{{ $training_menu->name }}</label>
    @endif
    @endforeach
    <div>
      <input type="radio" class="btn-check" name="options" id="option-all-calendar" autocomplete="off" onClick="calendarBtnAction()" checked>
        <label class="btn btn-outline-primary" for="option-all-calendar">カレンダー</label>
      <input type="radio" class="btn-check" name="options" id="option-all-graph" autocomplete="off" onClick="chartBtnAction()">
        <label class="btn btn-outline-primary" for="option-all-graph">グラフ</label>
    </div>
    <!-- カレンダー -->
    <div id="myCalendar" class="wrapper">
      <h1 id="header"></h1>
      <div id="next-prev-button">
        <button id="prev" onclick="prev()">‹</button>
        <button id="next" onclick="next()">›</button>
      </div>
      <div id="calendar"></div>
    </div>
      
    <!-- グラフ -->
    <div id="myChart" style="max-width:900px;max-height:450px;">
      <canvas id="myChart1"></canvas>
    </div>

    
  </div>
  @endforeach
</div>
@endsection