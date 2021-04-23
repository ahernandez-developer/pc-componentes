<template>
  <v-form lazy-validation ref="form">
    <div class="px-10 py-4">
      <v-row justify="space-between">
        <h1 class="ma-3">Detalles de proveedor</h1>
        <v-btn
          class="ma-3 primary--text text-capitalize"
          color="accent"
          depressed
          to="/catalogs/suppliers"
          :disabled="!status"
        >
          Volver
          <v-icon dark right> mdi-undo-variant </v-icon>
        </v-btn>
      </v-row>
      <v-row>
        <v-col>
          <v-card light class="pa-5">
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Nombre"
                  readonly
                  v-model="supplier.name"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Dirección"
                  readonly
                  v-model="supplier.address"
                />
              </v-col>
            </v-row>
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Responsable"
                  readonly
                  v-model="supplier.responsable"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Teléfono"
                  readonly
                  v-model="supplier.phone_number"
                />
              </v-col>
            </v-row>
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  append-icon="mdi-circle"
                  label="Estado"
                  readonly
                  :color="supplier.is_active ? 'green' : 'red'"
                  v-model="status"
                />
              </v-col>
              <v-col cols="12" md="6"> </v-col>
            </v-row>
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Fecha de alta"
                  readonly
                  :value="supplier.created_at | moment"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Última actualización"
                  readonly
                  :value="supplier.updated_at | moment"
                />
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-row>
    </div>
  </v-form>
</template>

<script>
import AppBar from "@/components/AppBar";
import moment from "moment";

export default {
  name: "Show",
  components: {
    AppBar,
  },
  created() {
    this.supplierId = this.$route.params.id;
    this.findSupplier(this.supplierId);
    moment.locale("es");
  },
  data() {
    return {
      supplierId: 0,
      status: false,
      supplier: {},
    };
  },
  methods: {
    findSupplier() {
      dispatch(
        {
          controller: "suppliers",
          action: "find",
          params: this.supplierId,
        },
        (response) => {
          this.supplier = response;
          this.status = this.supplier.is_active ? "Activo" : "Deshabilitado";
        }
      );
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