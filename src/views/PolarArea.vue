<script>
import { PolarArea } from "vue-chartjs";

export default {
  extends: PolarArea,
  mounted() {
    this.gradient = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);
    this.gradient2 = this.$refs.canvas
      .getContext("2d")
      .createLinearGradient(0, 0, 0, 450);

    this.gradient.addColorStop(0, "rgba(255, 0,0, 0.5)");
    this.gradient.addColorStop(0.5, "rgba(255, 0, 0, 0.25)");
    this.gradient.addColorStop(1, "rgba(255, 0, 0, 0)");

    this.gradient2.addColorStop(0, "rgba(0, 231, 255, 0.9)");
    this.gradient2.addColorStop(0.5, "rgba(0, 231, 255, 0.25)");
    this.gradient2.addColorStop(1, "rgba(0, 231, 255, 0)");
    this.renderChart(
      {

        labels: ["Дружба", "Отдых, увлечения", "Работа","Любовь, семья", "Здоровье, внешность", "Саморазвитие"],
        datasets: [
          {
            backgroundColor: ["#5F9AFF", "#5F9AFF", "#5F9AFF", "#5F9AFF", "#5F9AFF", "#5F9AFF"],
            data: [15, 20, 10, 30,50,50]
          }
        ]
      },

//my
     {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
            display: false, 
        },
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        ticks: {
            display: false,  
        },
        gridLines: {
          display: false
        }
      }]
    },
    tooltips: {
      mode: false,
      callbacks: {
        title: function() {},
        //label: function() {}
      }
    },
    plugins: {
            datalabels: {
                color: '#111',
                textAlign: 'center',
                font: {
                    lineHeight: 1.6
                },
                formatter: function(value) {
                    return value + '%';
                }
            }
      },
  },

//end-my


    );
  }
};
</script>