$(function () {
    //トレーニングリザルトのset追加の処理
    $("#add-set-button").on("click", function () {
        const formCount = $("input").length + 1;
        const newSet =
            `
          <label>` +
            formCount +
            `set目</label>
          <div>
            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="100" aria-describedby="weight" name="weight">
              <span class="input-group-text" id="weight">kg</span>
            </div>
            <div>×</div>
            <div class="input-group mb-3">
              <input type="number" class="form-control" placeholder="10" aria-describedby="rep" name="rep">
              <span class="input-group-text" id="rep">回</span>
            </div>
          </div>
        `;
        $("#training-result-form").append(newSet);
    });

    //add_training_resultモーダルが閉じた時リセット
});
