<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row class="mt-11" justify="space-between">
        <h1 class="ma-3">Salida de inventario</h1>
        <v-btn
          class="ma-3 text-capitalize"
          color="success"
          depressed
          @click="validate"
        >
          Aceptar
          <v-icon dark right> mdi-check </v-icon>
        </v-btn>
      </v-row>
      <v-row>
        <v-col>
          <v-form v-model="status" lazy-validation ref="form">
            <v-card flat>
              <h2>Seleccione las series que desea marcar para la salida</h2>
              <v-row>
                <v-col>
                  <v-text-field
                    outlined
                    class="mt-2 text-capitalize"
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Buscar"
                    hide-details
                  >
                  </v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-data-table
                    :headers="headers"
                    :items="supplies"
                    :items-per-page="7"
                    :search="search"
                    class="elevation-0 primary--text"
                    @click:row="addDeparture"
                    light
                  >
                    <template v-slot:[`item.expiration_date`]="{ item }">
                      {{ item.expiration_date | moment }}
                    </template>
                  </v-data-table>
                </v-col>
              </v-row>
              <v-divider />
              <h2 class="pt-4">Salidas</h2>
              <v-row
                v-for="(departure, index) in departures"
                class="my-5"
                :key="index"
              >
                <v-col cols="12" md="4">
                  <v-text-field
                    outlined
                    v-model="departure.inventory.supply.name"
                    readonly
                  ></v-text-field>
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    outlined
                    label="Cantidad"
                    v-model="departure.quantity"
                    type="number"
                    step="any"
                    min="0"
                  />
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    outlined
                    label="Medida"
                    v-model="departure.inventory.supply.measure.name"
                    suffix="(s)"
                    type="text"
                  />
                </v-col>
                <v-col cols="12" md="2"> </v-col>
                <v-col cols="12" md="2">
                  <v-btn
                    v-if="departures.length > 0"
                    class="white--text text-capitalize"
                    color="error"
                    depressed
                    x-large
                    @click="removeDeparture(index)"
                  >
                    Eliminar
                    <v-icon dark right> mdi-delete </v-icon>
                  </v-btn>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-textarea
                    label="Motivo"
                    v-model="reason"
                    :rules="reasonRules"
                    outlined
                  ></v-textarea>
                </v-col>
              </v-row>
            </v-card>
          </v-form> </v-col
      ></v-row>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";
import moment from "moment";
export default {
  name: "Current",
  components: {
    AppBar,
  },
  props: {
    supplies: Array,
  },
  created() {
    console.log(this.supplies);
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
        {
          text: "Proveedor",
          value: "supplier.name",
        },
        { text: "Cantidad disponible", align: "start", value: "quantity" },
        { text: "Medida", value: "inventory.supply.measure.name" },
      ],
      search: "",
      status: false,
      departures: [],
      reason: "",
      reasonRules: [
        (v) => !!v || "Ingrese un motivo de la salida de inventario",
        (v) =>
          !v || v.length >= 1 || "Ingrese un motivo de la salida de inventario",
      ],
    };
  },
  methods: {
    validate() {
      let valid = this.$refs.form.validate();
      if (valid == true) this.createDeparture();
    },
    createDeparture() {
      console.log(this.departures);
      this.departures.forEach((departure) => {
        departure.inventory = null;
        departure.supplier = null;
      });
      this.$inertia.post(route("inventory.departure.store"),{reason:this.reason,departures:this.departures} );
    },
    addDeparture(item) {
      let departure = {};
      Object.assign(departure, item);
      if (!this.departures.some((dep) => dep.id == departure.id))
        this.departures.push(departure);
    },
    removeDeparture(index) {
      this.departures.splice(index, 1);
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