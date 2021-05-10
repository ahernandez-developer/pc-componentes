<template>
  <v-app>
    <app-bar />
    <div class="px-10 py-4">
      <v-row justify="space-between">
        <h1 class="ma-3">Inventario actual</h1>
        <v-btn
          class="ma-3 primary--text text-capitalize"
          color="accent"
          depressed
        >
          Agregar
          <v-icon dark right> mdi-plus </v-icon>
        </v-btn>
      </v-row>

      <v-row>
        <v-col>
          <v-data-table
            :headers="headers"
            :items="supplies"
            :items-per-page="7"
            class="elevation-1 primary--text"
            light
          >
            <template v-slot:[`item.inventory.supply.name`]="{ item }">
              {{ item.inventory.supply.name }}
            </template>
            <template v-slot:[`item.inventory.supply.measure.name`]="{ item }">
              {{ item.inventory.supply.measure.name }}(s)
            </template>
          </v-data-table>
        </v-col>
      </v-row>
    </div>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "Current",
  components: {
    AppBar,
  },
  props: { supplies: Array },
  created() {},
  data() {
    return {
      headers: [
        {
          text: "Insumo",
          align: "start",
          sortable: false,
          value: "inventory.supply.name",
        },
        { text: "Cantidad disponible", align: "start", value: "quantity" },
        { text: "Medida", value: "inventory.supply.measure.name" },
        { text: "Mínimo sugerido", value: "inventory.min" },
        { text: "Máximo sugerido", value: "inventory.max" },
      ],
    };
  },
  methods: {},
};
</script>

<style>
</style>