<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card outlined light class="mt-7 pa-5">
            <v-card-title>
              Agregar proveedor
            </v-card-title>
            <v-form v-model="status" lazy-validation ref="form" >
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Nombre"
                    v-model="supplier.name"
                    :rules="nameRules"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Dirección"
                    v-model="supplier.address"
                  />
                </v-col>
              </v-row>
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Responsable"
                    v-model="supplier.responsable"
                    :rules="responsableRules"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Teléfono"
                    v-model="supplier.phone_number"
                    :rules="phoneRules"
                  />
                </v-col>
              </v-row>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  class="ma-3 text-capitalize"
                  color="primary"
                  depressed
                  @click="validate"
                  :disabled="!status"
                >
                  Confirmar
                  <v-icon dark right> mdi-check </v-icon>
                </v-btn>
              </v-card-actions>
            </v-form>
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
  data: () => ({
    status: false,
    supplier: {
      name: "",
      address: "",
      responsable: "",
      phone_number: "",
      is_active: 1,
    },
    nameRules: [
      (v) => !!v || "Ingrese el nombre",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
    responsableRules: [
      (v) => !!v || "Es importante identificar un contacto",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
    phoneRules: [
      (v) => !!v || "Ingrese un número de teléfono para contactar al proveedor",
      (v) => !v || v.length >= 3 || "Ingrese un número de teléfono valido",
    ],
  }),
  methods: {
    validate(event) {
      let valid = this.$refs.form.validate();
      if (valid == true) this.storeSupplier();
    },
    storeSupplier() {
      this.$inertia.post('/admin/catalogs/suppliers', this.supplier); 
      
    },
  },
};
</script>

<style>
</style>