<div class="modal fade" id="editGroupModal{{ $group->id }}" tabindex="-1"
  aria-labelledby="editGroupModalLabel{{ $group->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGroupModalLabel{{ $group->id }}">グループの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('groups.update', $group->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div id="training-result-form">
            <label>グループ名</label>
            <input type="text" name="name" value="{{ $group->name }}">
          </div>        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>