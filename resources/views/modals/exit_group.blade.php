<button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exitGroupModal">
  グループを退会する
</button>

<div class="modal fade" id="exitGroupModal" tabindex="-1" aria-labelledby="exitGroupModalLabel">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exitGroupModalLabel">グループを退会してもよろしいですか？</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
          </div>
          <div class="modal-footer">
              <form action="{{ route('participants.exit') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="hidden" name="group_id" class="form-control" value="{{ $group->id }}">
                  </div>
                  <button type="submit" class="btn btn-danger">退会</button>
              </form>
          </div>
      </div>
  </div>
</div>