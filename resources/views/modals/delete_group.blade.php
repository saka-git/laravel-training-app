<div class="modal fade" id="deleteGroupModal{{ $group->id }}" tabindex="-1" aria-labelledby="deleteGroupModalLabel{{ $group->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteGroupModalLabel{{ $group->id }}">削除してもよろしいですか？</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <div class="modal-footer">
              <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">削除</button>
              </form>
          </div>
      </div>
  </div>
</div>