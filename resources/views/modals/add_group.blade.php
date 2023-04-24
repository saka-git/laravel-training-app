<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGroupModal">
  ＋ グループを作る
</button>

<!-- Modal -->
<div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="addGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGroupModalLabel">グループ作成</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('groups.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>グループ名</label>
            <input type="text" name="name" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">作成</button>
        </div>
      </form>  
    </div>
  </div>
</div>