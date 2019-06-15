import * as Months from "../utils/Months.js";

/**
 * Verifica a quantidade de dias em um mês. Método aplicado em objetos do tipo Date
 *
 * @returns {number}
 */
Date.prototype.diasNoMes = function () {
    const days = [30, 31];
    const m = this.getMonth();

    if (m === 1) {
        return this.getFullYear() % 4 === 0 &&
        (this.getFullYear() % 100 !== 0 || this.getFullYear() % 400 === 0) ? 29 : 28;
    } else {
        return days[(m + (m < 7 ? 1 : 0)) % 2];
    }
};
const date = new Date();

Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

$(document).ready(function () {
    // Vendas Mensais
    $.ajax({
        url: "http://localhost/JobSmart-WEB/core/dll/VendasMensaisController.php",
        method: "GET",
        success: function (data) {
            let labels = [];
            let dados = [];

            for (let i in data) {
                labels.push(data[i].mes);
                dados.push(parseInt(data[i].qtdVendas));
            }

            // Grafico de Vendas Mensais
            var ctx = document.getElementById("vendas-mensais");
            var vendasMensais = new Chart(ctx, {
                type: "line",
                data: {
                    labels,
                    datasets: [
                        {
                            label: "Vendas",
                            lineTension: 0.3,
                            backgroundColor: "rgba(0,216,23,0.2)",
                            borderColor: "rgb(0,216,48)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: dados
                        }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [
                            {
                                time: {
                                    unit: "date"
                                },
                                gridLines: {
                                    display: true
                                },
                                ticks: {
                                    maxTicksLimit: date.diasNoMes()
                                }
                            }
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    min: Math.min.apply(Math, dados) - 1,
                                    max: Math.max.apply(Math, dados) + 1,
                                    maxTicksLimit: 10
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)"
                                }
                            }
                        ]
                    },
                    legend: {
                        display: false
                    }
                }
            });


        },
        error: function (data) {
            console.log(data);
        }
    })

    $.ajax({
        url: "http://localhost/JobSmart-WEB/core/dll/ReceitasMensaisController.php",
        method: "GET",
        success: function (data) {
            let labels = [];
            let dados = [];
            debugger;
            for (let i in data) {
                labels.push(data[i].mes);
                dados.push(parseInt(data[i].vlrVendas));
            }

            // Bar Chart Example
            var ctx = document.getElementById("receitas-mensais");
            var receitasMensais = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "receitas-mensais",
                        backgroundColor: "rgba(0,216,23,0.2)",
                        borderColor: "rgb(0,216,48)",
                        data: dados
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: true
                            },
                            ticks: {
                                maxTicksLimit: date.diasNoMes()
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: Math.min.apply(Math, dados) - (Math.min.apply(Math, dados) * 0.5),
                                max: Math.max.apply(Math, dados) + (Math.min.apply(Math, dados) * 0.5),
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, .125)",
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });


        },
        error: function (data) {
            console.log(data);
        }
    })
});
