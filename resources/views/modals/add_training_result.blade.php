<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTrainingResultModal">
  ＋ トレーニング
</button>

<!-- Modal -->
<div class="modal fade" id="addTrainingResultModal" tabindex="-1" aria-labelledby="addTrainingResultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">トレーニングの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('training_results.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <div id="training-result-form">
            <input type="date" name="date[]" value="<?php echo date('Y-m-d');?>">
            <label>トレーニングカテゴリ</label>
            <select class="form-select mb-3" name="training_menu_id[]">
              @foreach ($training_menus as $training_menu)
              <option value="{{ $training_menu->id }}">{{ $training_menu->name }}</option>
              @endforeach
            </select>
            <label>1set目</label>
            <div clqss="row w-100">
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="100" aria-describedby="weight" name="weight[]">
                <span class="input-group-text" id="weight">kg</span>
              </div>
              <div>×</div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="10" aria-describedby="rep" name="rep[]">
                <span class="input-group-text" id="rep">回</span>
              </div>
              <input type="hidden" name="num[]">
            </div>
          </div>
          <button type="button" class="btn btn-primary" id="add-set-button">＋ set</button>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">追加</button>
        </div>
      </form>
    </div>
  </div>
</div>