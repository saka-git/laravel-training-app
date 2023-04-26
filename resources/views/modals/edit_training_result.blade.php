<div class="modal fade" id="editTrainingResultModal{{ $training_result->id }}" tabindex="-1"
  aria-labelledby="editTrainingResultModalLabel{{ $training_result->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTrainingResultModalLabel{{ $training_result->id }}">トレーニングの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('training_results.update', $training_result->id) }}" method="post" class="edit-result">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div id="training-result-form">
            <input type="date" name="date" value="{{ $training_result->date }}">
            <label>トレーニングカテゴリ</label>
            <select class="form-select mb-3" name="training_menu_id">
              @foreach ($training_menus as $training_menu)
                @if ($training_menu->id === $training_result->training_menu_id)
                  <option value="{{ $training_menu->id }}" selected>{{ $training_menu->name }}</option>
                @else
                  <option value="{{ $training_menu->id }}">{{ $training_menu->name }}</option>
                @endif
              @endforeach
            </select>
            <div clqss="row w-100">
              <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="100" aria-describedby="weight" name="weight" value="{{ $training_result->weight }}">
                <span class="input-group-text" id="weight">kg</span>
              </div>
              <div>×</div>
              <div class="input-group mb-3">
                <input type="number" class="form-control required" placeholder="10" aria-describedby="rep" name="rep" value="{{ $training_result->rep }}">
                <span class="input-group-text" id="rep">回</span>
              </div>
            </div>
          </div>        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary edit-submit">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>