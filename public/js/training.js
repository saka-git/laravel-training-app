//　グラフのデータ加工
const createChartData = (
    maxResults = trainingMaxResults,
    totalResults = trainingTotalResults,
    dateRange
) => {
    // aとbの配列を結合
    const result = [];
    for (const date of dateRange) {
        const objMax = maxResults.find((obj) => obj.date === date) || null;
        const objTotal = totalResults.find((obj) => obj.date === date) || null;
        result.push({ date, ...objMax, ...objTotal });
    }

    // YYYY-mm-ddからmm-ddへ変更
    const formattedDates = dateRange.map((dateString) => {
        const date = new Date(dateString);
        const month = date.getMonth() + 1;
        const day = date.getDate();
        return `${month.toString().padStart(2, "0")}-${day
            .toString()
            .padStart(2, "0")}`;
    });

    // グラフのデータ
    const labels = formattedDates;

    // 結合されたデータからsumとmaxを抽出、データに代入
    const data1 = result.map((item) => item["sum"]);
    const data2 = result.map((item) => item["max(weight)"]);
    return { data1, data2, labels: formattedDates };
};

let maxResults = trainingMaxResults;
let totalResults = trainingTotalResults;

//グラフのDOM取得
const ctx = document.getElementById("myChart1").getContext("2d");

// 関数を呼び出し、得られた値をグラフに設定
const { data1, data2, labels } = createChartData(
    maxResults,
    totalResults,
    dateRange
);

const data = {
    labels: labels,
    datasets: [
        {
            label: "総負荷量",
            data: data1,
            borderColor: "rgba(54,164,235,0.8)",
            backgroundColor: "rgba(54,164,235,0.5)",
            yAxisID: "y1",
            order: 1,
        },
        {
            label: "Max",
            data: data2,
            borderColor: "rgba(254,97,132,0.8)",
            backgroundColor: "rgba(254,97,132,0.5)",
            spanGaps: true,
            yAxisID: "y2",
            type: "line",
            order: 0,
        },
    ],
};
const myChart = new Chart(ctx, {
    type: "bar",
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
            },
            title: {
                display: true,
                text: "総負荷量、Maxグラフ",
            },
        },
        scales: {
            y1: {
                type: "linear",
                position: "left",
            },
            y2: {
                type: "linear",
                position: "right",
                gridLines: {
                    drawOnChartArea: false,
                },
            },
        },
    },
});
