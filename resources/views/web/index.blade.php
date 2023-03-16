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
        <h5>0/0のトレーニンングメニュー</h5>
        <div>
          <!-- トレーニング追加用モーダル -->
          @include('modals.add_training_result')
          <!-- パーソナルデータ追加用モーダル -->
          @include('modals.add_personal_data')       
        </div>
      </div>

      <div class="row">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            Featured
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection