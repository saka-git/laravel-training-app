@extends('layouts.app')

@section('content')
<!-- トレーニング追加用モーダル -->
@include('modals.add_training_result')
<!-- トレーニングメニュー追加用モーダル -->
@include('modals.add_training_menu')
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
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
    <input type="radio" class="btn-check" name="options" id="option-all-calendar" autocomplete="off" checked onClick="calenderBtnAction()">
      <label class="btn btn-outline-primary" for="option-all-calendar">カレンダー</label>
    <input type="radio" class="btn-check" name="options" id="option-all-graph" autocomplete="off" onClick="alert(789)">
      <label class="btn btn-outline-primary" for="option-all-graph">グラフ</label>
  <div>
    <canvas id="myChart"></canvas>
  </div>
  </div>
  
  @foreach ($training_categories as $training_category)
  <div class="tab-pane fade" id="pills-{{ $training_category->id }}" role="tabpanel" aria-labelledby="pills-{{ $training_category->id }}-tab">
    <button type="button" class="btn btn-outline-primary">All</button>
    @foreach ($training_menus as $training_menu)
    @if ($training_menu->training_category_id === $training_category->id)
    <button type="button" class="btn btn-outline-primary">{{ $training_menu->name }}</button>
    @endif
    @endforeach
  </div>
  @endforeach
</div>
@endsection