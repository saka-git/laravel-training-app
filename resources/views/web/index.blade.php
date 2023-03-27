@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- サイドバー -->
    <div class="col-2">
      <div>
        <ul>
          <li><a href="{{ route('training.index') }}">Training</a></li>
          <li><a>その他</a></li>
        </ul>
      </div>
    </div>
    <div class="col-9">
      <div class="row d-flex justify-content-between">
        <h5>{{ $latest_training_result->date }}のトレーニンングメニュー</h5>
        <div>
          <!-- トレーニング追加用モーダル -->
          @include('modals.add_training_result')
          <!-- パーソナルデータ追加用モーダル -->
          @include('modals.add_personal_data')       
        </div>
      </div>
      <div class="row">
        @foreach ($distinct_training_menus as $distinct_training_menu)
          <div class="card col-3" style="width: 18rem;">
            <div class="card-header">
              {{ $distinct_training_menu->name }}
            </div>
            <ul class="list-group list-group-flush">
              @foreach ($training_results as $training_result)
                @if ($distinct_training_menu->training_menu_id === $training_result->training_menu_id)
                  <li class="list-group-item">{{ $training_result->weight }}kg×{{ $training_result->rep }}回</li>
                @endif
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
      <div class="wrapper">
        <h1 id="header"></h1>
        <div id="next-prev-button">
          <button id="prev" onclick="prev()">‹</button>
          <button id="next" onclick="next()">›</button>
        </div>
        <div id="calendar"></div>
      </div>
    </div>
  </div>


@endsection