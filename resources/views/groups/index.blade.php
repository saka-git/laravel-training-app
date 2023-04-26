@extends('layouts.app')

{{-- jsファイル読み込み --}}
@push('scripts')
<script src="{{ asset('/js/group.js') }}"></script>
@endpush

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
  <div class="col-md-9">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>加入中のグループ</h4>
            <div class="list-group">
              @foreach (auth()->user()->groups as $group)
                  <a href="{{ route('groups.show', $group) }}" class="list-group-item list-group-item-action list-group-item-primary">
                    {{ $group->name }}
                  </a>
              @endforeach
            </div>
        </div>
        <div class="col-md-4">
          <h4>作成したグループ</h4>
          <ul class="list-group">
            @foreach (auth()->user()->groups as $group)
              @if ($group->user_id == Auth::id())
                <li class="list-group-item d-flex justify-content-between">
                  {{ $group->name }}
                  <div class="d-flex align-items-center">                                 
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownResultLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                        <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownResultLink">
                            <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editGroupModal{{ $group->id }}">編集</a></li>                                   
                            <div class="dropdown-divider"></div>
                            <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteGroupModal{{ $group->id }}">削除</a></li>                                                                                                          
                        </ul>
                    </div>
                  </div>
                </li>
                <!-- グループの編集用モーダル -->
                @include('modals.edit_group') 
                <!-- グループの削除用モーダル -->
                @include('modals.delete_group')
              @endif 
            @endforeach
          </ul>
          <div class="mt-2 d-flex justify-content-center">
            <!-- グループ追加用モーダル -->
            @include('modals.add_group')
          </div>
        </div>
        <div class="col-md-4">
          <h4>招待されているグループ</h4>
          <div>
            <ul class="list-group">
              @foreach ($introduced_groups as $introduced_group)
                <li class="list-group-item">
                  <div class="d-flex justify-content-between">
                    <p style="margin:auto 0">{{ $introduced_group->name }}</p>
                    <div class="d-flex">
                      <div>
                        <form action="{{ route('participants.store') }}" method="post">
                        @csrf
                          <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::id() }}">
                            <input type="hidden" name="group_id" class="form-control" value="{{ $introduced_group->group_id }}">
                            <input type="hidden" name="invitation_id" class="form-control" value="{{ $introduced_group->id }}">
                          </div>
                          <button type="submit" class="btn btn-primary">参加</button>
                        </form> 
                      </div>
                      <div>
                        <form action="{{ route('invitations.destroy',$introduced_group->id) }}" method="post">
                          @csrf
                          @method('delete')
                            <button type="submit" class="btn btn-danger">拒否</button>
                        </form>
                      </div> 
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection