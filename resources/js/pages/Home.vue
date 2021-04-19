<template>
  <div>
    <app-bar />
    <div class="mx-4">
      <h2>Hoy</h2>
      <v-row>
        <v-col cols="12" sm="3">
          <v-card outlined class="text-center">
            <v-card-text>
              <h1>${{ todayTicketAvg }}</h1>
              Ticket promedio
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="12" sm="3">
          <v-card outlined class="text-center">
            <v-card-text>
              <h1>{{ todaySales }}</h1>
              Cantidad de ordenes
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="12" sm="3">
          <v-card outlined class="text-center">
            <v-card-text>
              <h1>${{ todayTotalSales }}</h1>
              Total de ventas
            </v-card-text>
          </v-card>
        </v-col>
        <v-col cols="12" sm="3">
          <v-card outlined class="text-center">
            <v-card-text>
              <h1>{{ todayHourWithMoreSales }}</h1>
              Hora con mas ventas ({{ todayHourWithMoreSalesCount }})
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
      <v-divider></v-divider>
      <h2>Analisis historico</h2>
      <v-row>
        <v-col cols="12" sm="5">
          <v-simple-table
            height="585px"
            fixed-header
            class="text-center grey lighten-5 black--text"
          >
            <template v-slot:default>
              <thead>
                <tr>
                  <th class="text-left">Folio</th>
                  <th class="text-left">Productos</th>
                  <th class="text-left">Total</th>
                  <th class="text-left">Fecha</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="sale in tickets" :key="sale.id">
                  <td>{{ sale.folio }}</td>
                  <td>{{ sale.ticket_details.length }}</td>
                  <td>${{ sale.total }}</td>
                  <td>{{ sale.created_at | moment }}</td>
                </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-col>
        <v-col cols="12" sm="7">
          <v-row justify="center">
            <h2>{{ metricInReview.name }}</h2>
            <v-col cols="12" md="12">
              <v-card
                height="350px"
                outlined
                color="grey lighten-4"
                class="pa-1 rounded-lg"
              >
                <BarChart :options="options" :chartData="chartData" />
              </v-card>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="12" md="12">
              <v-card outlined>
                <v-tabs
                  v-model="selectedTab"
                  height="215"
                  background-color="dark accent-4"
                  center-active
                  flat
                  next-icon="mdi-arrow-right-bold-circle"
                  prev-icon="mdi-arrow-left-bold-circle"
                  show-arrows
                >
                  <v-tab
                    v-for="metric in selectedMetrics"
                    :key="metric.id"
                    @change="updateMetricInReview(metric, selectedTab)"
                  >
                    <v-card outlined height="125" width="125" class="mx-2 mt-0">
                      <v-card-text>
                        <BarChart
                          :options="optionsMiniCharts"
                          :chartData="miniMetricsData[metric.id]"
                        />
                      </v-card-text>
                      <v-card-actions class="justify-center caption">
                        {{ metric.name }}
                      </v-card-actions>
                    </v-card>
                  </v-tab>
                </v-tabs>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script>
import AppBar from "../components/AppBar";
import BarChart from "../components/BarChart";
import moment from "moment";

export default {
  components: {
    AppBar,
    BarChart,
  },
  props: [
    "tickets",
    "todayTicketAvg",
    "todaySales",
    "todayTotalSales",
    "todayHourWithMoreSales",
    "todayHourWithMoreSalesCount",
    "totalSalesByDay",
    "avgTotalHours",
  ],
  created() {
    moment.locale("es");
    this.buildChartsData();
  },
  data() {
    return {
      selectedTab: 0,
      options: {
        responsive: true,
        legend: {
          display: false,
        },
        elements: {
          line: {
            tension: 0.3,
          },
        },
        maintainAspectRatio: true,
        tooltips: {
          enabled: true,
          position: "nearest",
          caretSize: 20,
          mode: "index",
          intersect: false,
          titleFontSize: 16,
          titleFontColor: "white",

          callbacks: {
            title: (tooltipItem, _) => {
              return tooltipItem[0].xLabel;
            },
            label: (tooltipItem, _) => {
              const { yLabel } = tooltipItem;
              if (tooltipItem.datasetIndex == 0) return `Total: $${yLabel}`;
            },
          },
        },
        maintainAspectRatio: false,
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
      optionsMiniCharts: {
        responsive: true,
        legend: {
          display: false,
        },
        maintainAspectRatio: true,
        scales: {
          xAxes: [
            {
              display: false,
              gridLines: {
                display: true,
                drawBorder: true,
                drawOnChartArea: false,
                drawTicks: false,
              },
            },
          ],
          yAxes: [
            {
              display: false,
              gridLines: {
                display: true,
                drawBorder: true,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
      miniMetricsData: [],
      chartData: {
        labels: [],
        datasets: [],
      },
      selectedMetrics: [
        {
          id: 0,
          name: "Ventas/Dia",
        },
        {
          id: 1,
          name: "Avg Ticket/Hora",
        },
      ],
      metricInReview: {
        name: "",
      },
    };
  },
  methods: {
    updateMetricInReview(){},
    buildChartsData() {
      let labels = [];
      let dataset = {
        label: "Total",
        borderColor: "green",
        fill: true,
        backgroundColor: "green",
        data: [],
      };
      Object.entries(this.totalSalesByDay).forEach(([key, value]) => {
        labels.push(key + "-" + (moment().month() + 1) + "-" + moment().year());
        dataset.data.push(value.reduce((a, b) => a + (b["total"] || 0), 0));
      });
      this.chartData.labels = labels;
      this.chartData.datasets.push(dataset);
      this.miniMetricsData.push(this.chartData);
      let avgTotalHourSales = {
        labels: [],
        datasets: [],
      };
      labels=[];
       dataset = {
        label: "Total",
        borderColor: "green",
        fill: true,
        backgroundColor: "green",
        data: [],
      };
     Object.entries(this.avgTotalHours).forEach(([key, value]) => {
        labels.push(value.value);
        dataset.data.push(value.value);
      });
      
      avgTotalHourSales.labels = labels;
      avgTotalHourSales.datasets.push(dataset);
      this.miniMetricsData.push(avgTotalHourSales);
    },
    isEmpty(obj) {
      return Object.keys(obj).length === 0;
    },
  },
  filters: {
    moment: function (date) {
      return moment(date).format("MMMM Do YYYY, h:mm:ss a");
    },
  },
};
</script>

<style>
</style>