@extends('layouts.app')

{{-- jsファイル読み込み --}}
@push('scripts')
<script src="{{ asset('/js/script.js') }}"></script>
@endpush

@section('content')
<!-- データ渡す用スクリプト -->
<script>
  //
  const trainingMenus = @json($training_menus);
  const trainingDates = @json($training_dates);
</script>
  <div class="row">
    <!-- サイドバー -->
    <div class="col-md-2 pc-sidebar">
      <div>
        <ul>
          <li><a href="{{ route('training_results.index') }}">Training</a></li>
          <li><a href="{{ route('groups.index') }}">Group</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <!-- トレーニング追加用モーダル -->
      @include('modals.add_training_result')
      @if($latest_training_result)
      <div>
        <h5 class="latest-date" style="margin:8px">{{ \Carbon\Carbon::parse($latest_training_result->date)->format('n月j日') }}のトレーニンングメニュー</h5>
      </div>
      <div class="row center-cards">
        @foreach ($distinct_training_menus as $distinct_training_menu)
          <div class="card col-3" style="width: 18rem; padding:0; margin:5px">
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
                  <li class="list-group-item d-flex justify-content-between">
                    @if($training_result->weight)
                      {{ $training_result->weight }}kg×
                    @endif
                      {{ $training_result->rep }}回
                    <div class="d-flex align-items-center">                                 
                      <div class="dropdown">
                          <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownResultLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                          <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownResultLink">
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
      @endif
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