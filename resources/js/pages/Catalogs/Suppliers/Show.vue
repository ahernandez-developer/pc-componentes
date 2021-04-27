<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card outlined light class="mt-7 pa-5">
            <v-card-title> Infomaci&oacute;n de proveedor </v-card-title>

            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field outlined label="Nombre" v-model="supplier.name" readonly />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Dirección"
                  v-model="supplier.address"
                  readonly
                />
              </v-col>
            </v-row>
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Responsable"
                  v-model="supplier.responsable"
                  readonly
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Teléfono"
                  v-model="supplier.phone_number"
                  readonly
                />
              </v-col>
            </v-row>

            <v-card-text>
              <v-row>
                <v-spacer></v-spacer>

                <v-btn
                  class="m-2"
                  color="primary"
                  :href="$route('catalogs.suppliers.index')"
                  :block="$vuetify.breakpoint.xs"
                >
                  Regresar
                  <v-icon dark right> mdi-keyboard-return</v-icon>
                </v-btn>
              </v-row>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "SuppliersCreate",
  components: {
    AppBar,
  },
  props: {
    supplier: Object,
  },
};
</script>
