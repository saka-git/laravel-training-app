@extends('layouts.app')

@section('content')

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
  <div class="col-md-10">
    <div class="container">
      <h2>{{ $group->name }}</h2>
      <div class="row">
        <div class="col-md-5">
          <div class="container">
            <h3>メンバー</h3>
            <hr>
            <ul class="list-group">
              @foreach ($group->users()->orderBy('id', 'asc')->get() as $user)                                    
              <li class="list-group-item">{{ $user->name }}</li>                                      
              @endforeach
            </ul>
            <hr>
            <div>
              <h3>グループを退会する</h3>
              <hr>
              <!-- グループ退会用モーダル -->
              @include('modals.exit_group')
            </div>
          </div> 
        </div>
        <div class="col-md-5">
          <div class="container">
            <h3>グループへ招待</h3>
            <hr>
            {{-- 検索機能 --}}
            <div>
              <form method="GET" action="{{ route('groups.show',$group->id) }}">
                <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="ユーザー名を入力" aria-label="ユーザー名を入力" aria-describedby="button-addon2" name="search" value="@if (isset($search)) {{ $search }} @endif">
                  <button class="btn btn-outline-primary" type="submit" id="button-addon2">検索</button>
                  {{-- クリアボタン --}}
                  {{-- <button class="btn btn-outline-secondary" type="button">
                    <a href="{{ route('groups.show',$group->id) }}">
                      クリア
                    </a>
                  </button> --}}
                </div>
              </form>
              <div>
              {{-- // TODO:下記のようにページネーターを記述するとページネートで次ページに遷移しても、検索結果を保持する --}}
                  {{-- {{ $institutions->appends(request()->input())->links() }} --}}
              </div>            
            </div>
            <ul class="list-group">
              @foreach($users as $user)
                <li class="list-group-item">
                  <div class="d-flex justify-content-between">
                    <p style="margin:auto 0">{{ $user->name }}</p>
                    @if($group->users()->where('user_id',$user->id)->exists())
                      <p style="margin:auto 0">加入済み</p>
                    @elseif($introduced_users->contains('user_id', $user->id))
                      <p style="margin:auto 0">招待済み</p>
                    @else
                      <form action="{{ route('invitations.store') }}" method="post">
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value="{{ $user->id }}">
                          <input type="hidden" name="group_id" class="form-control" value="{{ $group->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">招待</button>
                      </form>
                    @endif
                  </div>
                </li>
              @endforeach
            </ul>
            <div class="mt-3">
              {{ $users->appends(request()->input())->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection