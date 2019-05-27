import * as Months from "../utils/Months";

/**
 *  Preenche as opções da tag Select com os meses
 */
let selectMeses = document.getElementById("filtroMesVendas");
Months.mesesExtenso.forEach(mes => {
  const optionTag = `<option value="${mes.id}">${mes.nome}</option>`;
  selectMeses.innerHTML += optionTag;
});
/**
 * Verifica a quantidade de dias em um mês. Método aplicado em objetos do tipo Date
 *
 * @returns {number}
 */
Date.prototype.diasNoMes = function() {
  const days = [30, 31],
    m = this.getMonth();

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

// TODO: Passar ao atributo "data" um array, contendo as vendas definidas por dia, em um intervalo de um mês (busca no banco)
let dados = Array.from({ length: date.diasNoMes() }, () =>
  Math.floor(Math.random() * 50000)
);

let labels = [];
$(document).ready(function() {
  let mesAtual = Months.mesesAbrv[date.getMonth()].nome;

  for (let i = 1; i <= date.diasNoMes(); i++) {
    console.log(date.diasNoMes());
    const label = `${mesAtual} ${i}`;
    labels.push(label);
  }

  $("#filtroMesVendas").change(function() {
    // TODO: Passar novo array contendo o saldo de vendas de acordo com o mes
    mesAtual = Months.mesesAbrv[selectMeses.value].nome;
    for (let i = 1; i <= date.diasNoMes(); i++) {
      console.log(date.diasNoMes());
      const label = `${mesAtual} ${i}`;
      labels.push(label);
    }
    vendasMensais.update();
  });
});

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
            min: Math.min.apply(Math, dados),
            max: Math.max.apply(Math, dados),
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
