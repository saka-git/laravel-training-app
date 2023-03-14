// ヘッダーのドロップダウン
$(".dropdown-trigger").dropdown();

// モーダルオープン
document.addEventListener("DOMContentLoaded", function () {
    var elems = document.querySelectorAll(".modal");
    var instances = M.Modal.init(elems, options);
});

// タブ
var instance = M.Tabs.init(el, options);
