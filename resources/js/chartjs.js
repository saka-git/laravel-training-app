import Chart from "chart.js/auto";

const ctx = document.getElementById("myChart1").getContext("2d");

const labels = ["January", "February", "March", "April", "May", "June", "July"];
const data = {
    labels: labels,
    datasets: [
        {
            label: "Dataset 1",
            data: [20, 35, 40, 30, 45, 35, 40],
            borderColor: "#f88",
            backgroundColor: "#8f8",
            order: 1,
        },
        {
            label: "Dataset 2",
            data: [20, 15, 30, 25, 30, 40, 35],
            borderColor: "#484",
            backgroundColor: "#ffdab9",
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
                text: "Chart.js Combined Line/Bar Chart",
            },
        },
    },
});
