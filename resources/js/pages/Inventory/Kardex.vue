<template>
  <div class="px-10 py-4">
    <v-row justify="space-between">
      <h1 class="ma-3">Detalles del inventario</h1>
    </v-row>
    <v-row justify="space-between">
      <v-autocomplete
        v-model="selectedSupply"
        :items="supplies"
        :filter="customFilter"
        outlined
        dense
        item-text="name"
        item-value="id"
        label="Buscar insumo"
        class="tertiary--text mx-3 pt-3 text-capitalize"
        light
        persistent-hint
        return-object
        background-color="white"
      ></v-autocomplete>
      <v-btn
        class="ma-3 primary--text text-capitalize"
        color="accent"
        depressed
        @click="searchInventoryKardex"
        :disabled="!selectedSupply"
      >
        Buscar
        <v-icon dark right> mdi-magnify </v-icon>
      </v-btn>
    </v-row>

    <v-row>
      <v-col>
        <v-data-table
          :headers="headers"
          :items="supplyKardex"
          item-key="created_at"
          :items-per-page="7"
          class="elevation-0 primary--text"
          light
        >
          <template v-slot:[`item.event_type`]="{ item }">
            <v-container>
              <v-btn
                :color="item.event_type == 0 ? 'green' : 'red'"
                class="text-capitalize"
                depressed
              >
                {{ item.event_type == 0 ? "entrada" : "salida" }}
              </v-btn>
            </v-container>
          </template>
          <template v-slot:[`item.created_at`]="{ item }">
            {{ item.created_at | moment }}
          </template>
        </v-data-table>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import AppBar from "@/components/AppBar";
import moment from "moment";

export default {
  name: "Current",
  components: {
    AppBar,
  },
  created() {
    this.fetchSupplies();
    moment.locale("es");
  },
  data() {
    return {
      headers: [
        {
          text: "Insumo",
          align: "start",
          sortable: false,
          value: "inventory.supply.name",
        },
        { text: "Cantidad", align: "center", value: "quantity" },
        { text: "Evento", align: "center", value: "event_type" },
        { text: "Fecha", value: "created_at" },
      ],
      selectedSupply: null,
      supplies: [],
      supplyKardex: [],
    };
  },
  methods: {
    fetchSupplies() {
      dispatch(
        {
          controller: "supplies",
          action: "fetch",
        },
        (response) => {
          this.supplies = response;
        }
      );
    },
    searchInventoryKardex() {
      dispatch(
        {
          controller: "inventory",
          action: "searchInventoryKardex",
          params: this.selectedSupply,
        },
        (response) => {
          response.entries.map((entry) => {
            entry.event_type = 0;
            return entry;
          });

          response.departures.map((entry) => {
            entry.event_type = 1;
            return entry;
          });
          let inventory = response.entries.concat(response.departures);
          inventory.sort(function (a, b) {
            var c = new Date(a.created_at);
            var d = new Date(b.created_at);
            return c - d;
          }).reverse();
          console.log(inventory);
          this.supplyKardex = inventory;
        }
      );
    },
    customFilter(item, queryText, itemText) {
      const textOne = item.name.toLowerCase();
      const searchText = queryText.toLowerCase();

      return textOne.indexOf(searchText) > -1;
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