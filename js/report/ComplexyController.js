import * as Months from "../utils/Months.js";
import * as Round from "../utils/RoundPlus.js";
import * as Color from "../utils/Color.js";

export default $.ajax({
    url: "./core/dll/reports/ProdutoVendidoFuncionarioController.php",
    method: "GET",
    success: function (data) {
        let labels = [];
        let dados = [];
        let labelMaior = [];

        for (let i in data) {
            labels.push(data[i].nome);
            labelMaior.push(data[i].produto);
            dados.push(parseInt(data[i].maior));
        }



        // Bar Chart Example
        var ctx = document.getElementById("produto-funcionario-venda-mensal");
        var chartJax = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Vendas",
                        backgroundColor: Color.uniformColor(),
                        borderColor: Color.uniformColor(),
                        data: dados
                    }
                ]
            },
            options: {
                scales: {
                    xAxes: [
                        {
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
                            time: {
                                unit: "date"
                            },
                            ticks: {
                                min: Math.round10(
                                    Math.min.apply(Math, dados) -
                                    Math.min.apply(Math, dados) * 0.5,
                                    1
                                ),
                                max: Math.ceil10(Math.max.apply(Math, dados), 2),
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, .125)",
                                display: true
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
        console.error(data);
    }
});
