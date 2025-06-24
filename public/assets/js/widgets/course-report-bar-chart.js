"use strict";
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        fetch("/chart-data/course-report")
            .then((response) => response.json())
            .then((data) => {
                const chartOptions = {
                    chart: {
                        type: "bar",
                        height: 250, // Slightly taller for better scaling
                        toolbar: { show: false },
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: "60%",
                            borderRadius: 4,
                        },
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ["transparent"],
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "top",
                        horizontalAlign: "right",
                        fontFamily: `'Public Sans', sans-serif`,
                        offsetX: 10,
                        offsetY: 10,
                        itemMargin: { horizontal: 15, vertical: 5 },
                    },
                    colors: ["#4680ff", "#ffa21d"],
                    series: [
                        {
                            name: "Teachers",
                            data: data.teacher_data,
                        },
                        {
                            name: "Students",
                            data: data.student_data,
                        },
                    ],
                    grid: {
                        borderColor: "#00000010",
                    },
                    yaxis: {
                        show: true,
                        min: 0,
                        max: 5,
                        tickAmount: 5,
                        labels: {
                            style: {
                                fontFamily: `'Public Sans', sans-serif`,
                                fontSize: "12px",
                            },
                        },
                        title: {
                            text: "Count",
                            style: {
                                fontSize: "13px",
                                fontWeight: 600,
                            },
                        },
                    },
                    xaxis: {
                        categories: data.months,
                        labels: {
                            style: {
                                fontFamily: `'Public Sans', sans-serif`,
                                fontSize: "12px",
                            },
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return `${val} total`;
                            },
                        },
                    },
                };

                const chart = new ApexCharts(
                    document.querySelector("#course-report-bar-chart"),
                    chartOptions
                );
                chart.render();
            });
    }, 500);
});
