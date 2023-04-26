<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTrainingMenuModal">
  ＋ トレーニングメニュー
</button>

<!-- Modal -->
<div class="modal fade" id="addTrainingMenuModal" tabindex="-1" aria-labelledby="addTrainingMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTrainingMenuModalLabel">トレーニングメニューの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('menus.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>トレーニングカテゴリ</label>
            <select class="form-select" name="training_category_id">
              @foreach ($training_categories as $training_category)
              <option value="{{ $training_category->id }}">{{ $training_category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>トレーニングメニュー名</label>
            <input type="text" name="name" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="menu-submit" class="btn btn-primary">追加</button>
        </div>
      </form>  
    </div>
  </div>
</div>