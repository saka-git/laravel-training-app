@extends('layouts.app')

@section('content')
  <div class="row">
    <!-- サイドバー -->
    <div class="col-2">
      <div>
        <ul>
          <li><a href="{{ route('training_results.index') }}">Training</a></li>
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
                <!-- トレーニングリザルトの編集用モーダル -->
                @include('modals.edit_training_result') 
                <!-- トレーニングリザルトの削除用モーダル -->
                @include('modals.delete_training_result')
                
                @if ($distinct_training_menu->training_menu_id === $training_result->training_menu_id)
                  <li class="list-group-item">{{ $training_result->weight }}kg×{{ $training_result->rep }}回
                    <div class="d-flex align-items-center">                                 
                      <div class="dropdown">
                          <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none" id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                          <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGoalMenuLink">
                              <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTrainingResultModal{{ $training_result->id }}">編集</a></li>                                   
                              <div class="dropdown-divider"></div>
                              <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteTrainingResultModal{{ $training_result->id }}">削除</a></li>                                                                                                          
                          </ul>
                      </div>
                    </div>
                  </li>
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
      <!-- TODO const letどっち？  -->
      <script>
        const trainingDates = @json($training_dates);

      </script>
  
    </div>
  </div>


@endsection