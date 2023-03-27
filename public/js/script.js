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

// カレンダーとグラフの切り替え
const calendarBtnAction = () => {
    const myCalendar = document.getElementById("myCalendar");
    const myChart = document.getElementById("myChart");
    myCalendar.style.display = "block";
    myChart.style.display = "none";
};

const chartBtnAction = () => {
    const myCalendar = document.getElementById("myCalendar");
    const myChart = document.getElementById("myChart");
    myCalendar.style.display = "none";
    myChart.style.display = "block";
};

// カレンダー機能
const today = new Date();

let showDate = new Date(today.getFullYear(), today.getMonth(), 1);

const prev = () => {
    showDate.setMonth(showDate.getMonth() - 1);
    createCalendar(showDate);
};

const next = () => {
    showDate.setMonth(showDate.getMonth() + 1);
    createCalendar(showDate);
};

const createCalendar = (date) => {
    let year = date.getFullYear();
    let month = date.getMonth();
    document.querySelector("#header").innerHTML =
        year + "年" + (month + 1) + "月";

    let calendar = createTable(year, month);
    document.querySelector("#calendar").innerHTML = calendar;
};

const formatYYYYMMDD = (year, month, day) => {
    if (!year || !month || !day) return;
    return `${year}-${month.toString().padStart(2, "0")}-${day
        .toString()
        .padStart(2, "0")}`;
};

window.onload = () => {
    createCalendar(today);
};

const week = ["日", "月", "火", "水", "木", "金", "土"];

const createTable = (year, month) => {
    let calendar = "<table><tr class='dayOfWeek'>";
    for (let i = 0; i < week.length; i++) {
        calendar += "<th>" + week[i] + "</th>";
    }
    calendar += "</tr>";

    let count = 0;
    let startDayOfWeek = new Date(year, month, 1).getDay();
    let endDate = new Date(year, month + 1, 0).getDate();
    let lastMonthEndDate = new Date(year, month, 0).getDate();
    let row = Math.ceil((startDayOfWeek + endDate) / week.length);

    for (let i = 0; i < row; i++) {
        calendar += " <tr>";
        for (let j = 0; j < week.length; j++) {
            if (i == 0 && j < startDayOfWeek) {
                calendar +=
                    "<td class='disabled'>" +
                    (lastMonthEndDate - startDayOfWeek + j + 1) +
                    " </td>";
            } else if (count >= endDate) {
                count++;
                calendar +=
                    "<td class='disabled'>" + (count - endDate) + "</td>";
            } else {
                count++;

                // TODO:  atodesakuzyooytei
                const todayBkColorFlg =
                    year == today.getFullYear() &&
                    month == today.getMonth() &&
                    count == today.getDate();

                const isTrainingExec = trainingDates.some(
                    (training) =>
                        training.date === formatYYYYMMDD(year, month + 1, count)
                );

                if (todayBkColorFlg) {
                    calendar += `<td class="today"><a href=#>${count}</a></td>`;
                } else if (isTrainingExec) {
                    calendar += `<td class="traing-exec-calendar"><a href=#>${count}</a></td>`;
                } else {
                    calendar += `<td><a href=#>${count}</a></td>`;
                }
            }
        }
        calendar += " </tr>";
    }

    return calendar;
};
