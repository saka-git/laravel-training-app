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
            <div>
              <input type="date" name="date[]" id="add-date" value="<?php echo date('Y-m-d');?>">
              <div class="d-flex">
                  <label style="width:fit-content; margin:5px" class="d-flex align-items-center">トレーニングメニュー</label>
                <select id="add-select" class="form-select mt-2 mb-2" style="flex:1; width:auto" name="training_menu_id[]">
                  @foreach ($training_menus as $training_menu)
                  <option value="{{ $training_menu->id }}">{{ $training_menu->name }}</option>
                  @endforeach
                </select>
              </div>
              <div style="display:flex">
                <label style="margin:0 auto" class="d-flex align-items-center">1set目</label>
                <div class="input-group mt-2 mb-2" style="width:40%">
                  <input type="number" class="form-control" placeholder="100" aria-describedby="weight" name="weight[]">
                  <span class="input-group-text" id="weight">kg</span>
                </div>
                <div style="width:fit-content; margin:5px" class="d-flex align-items-center">×</div>
                <div class="input-group mt-2 mb-2" style="width:40%">
                  <input type="number" class="form-control" placeholder="10" aria-describedby="rep" name="rep[]">
                  <span class="input-group-text" id="rep">回</span>
                </div>
                <input type="hidden" name="num[]" class="number">
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-outline-primary" id="add-set-button">＋ set</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">追加</button>
        </div>
      </form>
    </div>
  </div>
</div>