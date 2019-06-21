import * as Months from "../utils/Months.js";
import * as Round from "../utils/RoundPlus.js";
import * as Color from "../utils/Color.js";

/**
 * Verifica a quantidade de dias em um mês. Método aplicado em objetos do tipo Date
 *
 * @returns {number}
 */
Date.prototype.diasNoMes = function() {
  const days = [30, 31];
  const m = this.getMonth();

  if (m === 1) {
    return this.getFullYear() % 4 === 0 &&
      (this.getFullYear() % 100 !== 0 || this.getFullYear() % 400 === 0)
      ? 29
      : 28;
  } else {
    return days[(m + (m < 7 ? 1 : 0)) % 2];
  }
};
const date = new Date();

Chart.defaults.global.defaultFontFamily =
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

$(document).ready(function() {
  // Vendas Mensais
  $.ajax({
    url: "./core/dll/reports/VendasMensaisController.php",
    method: "GET",
    success: function(data) {
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
    error: function(data) {
      console.error(data);
    }
  });

  $.ajax({
    url: "./core/dll/reports/ReceitasMensaisController.php",
    method: "GET",
    success: function(data) {
      let labels = [];
      let dados = [];

      for (let i in data) {
        labels.push(data[i].mes);
        dados.push(parseInt(data[i].vlrVendas));
      }

      // Bar Chart Example
      var ctx = document.getElementById("receitas-mensais");
      var receitasMensais = new Chart(ctx, {
        type: "bar",
        data: {
          labels: labels,
          datasets: [
            {
              label: "Faturamento",
              backgroundColor: "rgba(0,216,23,0.2)",
              borderColor: "rgb(0,216,48)",
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
    error: function(data) {
      console.error(data);
    }
  });

  $.ajax({
    url: "./core/dll/reports/TopDownVendasController.php",
    method: "GET",
    success: function(data) {
      let labels = [];
      let dados = [];
      let dadosMenor = [];
      let dadosMaior = [];
      let labelMenor = [];
      let labelMaior = [];

      for (let i in data) {
        labels.push(data[i].mes);
        labelMenor.push(data[i].menosvendido);
        labelMaior.push(data[i].maisvendido);
        dados.push(parseInt(data[i].menor));
        dados.push(parseInt(data[i].maior));
        dadosMenor.push(parseInt(data[i].menor));
        dadosMaior.push(parseInt(data[i].maior));
      }

      // Bar Chart Example
      var ctx = document.getElementById("top-down-venda-mensal");
      var maisMenosVendidosMensais = new Chart(ctx, {
        type: "bar",
        data: {
          labels: labels,
          datasets: [
            {
              label: labelMaior,
              backgroundColor: "rgb(57, 99, 168)",
              borderColor: "rgb(24, 107, 242)",
              data: dadosMaior
            },
            {
              label: labelMenor,
              backgroundColor: "rgb(186, 5, 5)",
              borderColor: "rgb(244, 4, 4)",
              data: dadosMenor
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
                  min: dados.menor,
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
    error: function(data) {
      console.error(data);
    }
  });

  $.ajax({
    url: "./core/dll/reports/VendasFuncionarioAnuaisController.php",
    method: "GET",
    success: function(data) {
      let labels = [];
      let dados = [];

      for (let i in data) {
        labels.push(data[i].nome);
        dados.push(parseInt(data[i].vendas));
      }

      // Bar Chart Example
      var ctx = document.getElementById("funcionario-anual");
      var receitasMensais = new Chart(ctx, {
        type: "pie",
        data: {
          datasets: [
            {
              backgroundColor: Color.uniformColor(),
              borderColor: Color.uniformColor(),
              data: dados
            }
          ],
          labels
        }
      });
    },
    error: function(data) {
      console.error(data);
    }
  });

  $.ajax({
    url: "./core/dll/reports/TopDownFuncionarioVendasController.php",
    method: "GET",
    success: function(data) {
      let labels = [];
      let dados = [];
      let dadosMenor = [];
      let dadosMaior = [];
      let labelMenor = [];
      let labelMaior = [];

      for (let i in data) {
        labels.push(data[i].mes);
        labelMenor.push(data[i].nomeMenor);
        labelMaior.push(data[i].nomeMaior);
        dados.push(parseInt(data[i].menor));
        dados.push(parseInt(data[i].maior));
        dadosMenor.push(parseInt(data[i].menor));
        dadosMaior.push(parseInt(data[i].maior));
      }

      var ctx = document.getElementById("top-down-funcionario-venda-mensal");
      var maisMenosVendidosMensais = new Chart(ctx, {
        type: "horizontalBar",
        data: {
          labels: labels,
          datasets: [
            {
              label: labelMaior,
              backgroundColor: "rgb(57, 99, 168)",
              borderColor: "rgb(24, 107, 242)",
              data: dadosMaior
            },
            {
              label: labelMenor,
              backgroundColor: "rgb(186, 5, 5)",
              borderColor: "rgb(244, 4, 4)",
              data: dadosMenor
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
    error: function(data) {
      console.error(data);
    }
  });

  $.ajax({
    url: "./core/dll/reports/ProdutoVendidoFuncionarioController.php",
    method: "GET",
    success: function(data) {
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
              label: labelMaior,
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
    error: function(data) {
      console.error(data);
    }
  });
});
