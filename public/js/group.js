// バリデーション（グループ）
window.addEventListener(
    "DOMContentLoaded",
    () => {
        /*各画面オブジェクト*/
        const btnSubmit = document.getElementById("group-submit");

        btnSubmit.addEventListener("click", function (event) {
            const requiredElems = document.querySelectorAll(".required");
            let message = [];
            /*入力値チェック*/
            //.required を指定した要素を検証
            requiredElems.forEach((elem) => {
                //値が空の場合はエラーを表示してフォームの送信を中止
                if (elem.value.trim() == "") {
                    message.push("入力は必須です");
                }
            });

            //エラーメッセージがある場合は、フォームの送信を中止してエラーメッセージを表示する
            if (message.length > 0) {
                event.preventDefault(); //フォーム送信を中止
                alert(message.join("\n")); //エラーメッセージを表示
            }
        });
    },
    false
);
